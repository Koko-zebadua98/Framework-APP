<?php

namespace App\Http\Controllers\subscritor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\servicio;
use App\User;
use App\pago;
use App\account;
use App\subscripciones;
use Carbon\Carbon;


class subscripcion extends Controller
{
    public function index($id){
        $subscripcion_a = DB::table('servicios')->where('id', $id)->get();

        // return view('subscritor.subscribir', ['servicio' => $subscripcion_a]);
        return response()->json(['success' => 'works']);

    }

    public function makeSubscripcion(Request $request){

        /**
         * Faltaria agregar validaciones, para verificar 
         * que cuente cons fondo suficiente
         */
        
        

        $id_servicio = $request->idServicio;
        
        // return response()->json(['success' => 'lol',
        // 'id' => $request->all(),
        // 'aid' => $request->idServicio
        // ]);

        $actual_user = Auth::user()->id;
        $servico_data = servicio::find($id_servicio);
        $servicio_costo = $servico_data->costo;
        $new_subscripcion = New subscripciones;
        $usuario = User::find($actual_user);

        // se consulta la cuenta del usuario 
        // $usuario->saldo =  ($usuario->saldo) - ($servicio_costo); 
        $estado_cuenta = account::where('id_user', '=', $actual_user)->first();
        $estado_cuenta->saldo = $estado_cuenta->saldo - $servico_data->costo;
        $estado_cuenta->save();
        
        $current = Carbon::now();
        $hoy = Carbon::now()->toDateString();
        $trialExpires = $current->addDays(31)->toDateString();
        
        

        $new_subscripcion->sub_fecha = $hoy;
        $new_subscripcion->renovacion = $trialExpires;
        $new_subscripcion->id_usuario = $actual_user;
        $new_subscripcion->id_servicio = $id_servicio;
        $new_subscripcion->cancelar = 0;
        $new_subscripcion->save();
        $usuario->save();

        $primer_pago = pago::create([
            'id_subscripcion' => $new_subscripcion->id,
            'se_pago' => $hoy,
            'monto' => $servicio_costo
        ]);


        

        
        // $expire_at = $trialExpires = $mytime->addDays(30);
        return response()->json([
            'message' => 'Subscrito al Servicio'
        ]);
    }

    public function hasSubscription(){
        $actual_user = Auth::user()->id;
        
        $servicios = DB::table('subscripciones')
            ->join('servicios', 'servicios.id', '=', 'subscripciones.id_servicio')
            ->join('users', 'users.id', '=', 'subscripciones.id_usuario')
            ->select('subscripciones.renovacion', 'servicios.nombre', 'servicios.costo', 'subscripciones.id', 'servicios.monto_mora')
            ->where('users.id', $actual_user)
            ->get();

            $current = Carbon::now();
            $hoy = Carbon::now();

            

            // ya va a pagar (no aun falta = flase)
            foreach ($servicios as $key => $value) {
                $fecha = Carbon::create($value->renovacion);
                $falta = $hoy->lessThanOrEqualTo($fecha);
                
                 $servicios[$key]->es_hora = $falta; 
            }

        return view('subscritor.userSubs', ['subs' => $servicios]);
    }

    public function paySubscription(Request $request, $id_subscrip){

        $actual_user = Auth::user()->id;
        $subcripcion_id = $id_subscrip;
        $a_pagar = $request->pago_total;
        $subs = subscripciones::find($subcripcion_id);

        $estado_cuenta = account::where('id_user', '=', $actual_user)->first();
        $estado_cuenta->saldo = $estado_cuenta->saldo - $a_pagar;
        $estado_cuenta->save();
        // return response()->json([
        //     'total' => $a_pagar,
        //     'id_usuario' => $actual_user,
        //     'a_pagar' => $estado_cuenta
        // ]);

        $current = Carbon::now();
        $hoy = Carbon::now();
        $plus_month = $current->addDays(31)->toDateString();
        $subs->renovacion =  $plus_month;

        //salvar nuevo pago
        $new_pay = New pago([
            'id_subscripcion' => $id_subscrip,
            'se_pago' => $hoy->toDateString(),
            'monto' => $a_pagar
        ]);
        //restar estado de cuenta
        
        $subs->save();
        $new_pay->save();

        return view('home');

    }
}
