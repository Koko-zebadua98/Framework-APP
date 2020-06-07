<?php

namespace App\Http\Controllers\contador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\pago;
use Illuminate\Support\Facades\DB;

class detallesSubscritoresController extends Controller
{
    public function showSubcritores(){
        $subcritores = User::where('role', 1)->get();
        return view('contador.subscritores', ['subs' => $subcritores]);
    }

    public function detalleSubscritor($id){
        $subscritor = User::where('id', $id)->get();

        $servicios = DB::table('subscripciones')
            ->join('servicios', 'servicios.id', '=', 'subscripciones.id_servicio')
            ->join('users', 'users.id', '=', 'subscripciones.id_usuario')
            ->select('subscripciones.renovacion', 'servicios.nombre', 'subscripciones.id')
            ->where('users.id', $id)
            ->get();
            // $servico_state = [];
            // foreach ($servicios as $key => $value) {
            //     $servico_state[$key]['renovacion'] = $value->renovacion;
            //     $servico_state[$key]['nombre'] = $value->nombre;
            //     $servico_state[$key]['id'] = $value->id;
            //     $existe_Pago = DB::select( DB::raw());
            // }


        return view('contador.detalleSubscritor', ['subs' => $subscritor]);
    }

    public function pagoDetalles($id){
        $pago = DB::table('pagos')
                ->join('subscripciones', 'pagos.id_subscripcion', '=', 'subscripciones.id')
                ->join('servicios', 'subscripciones.id_servicio', '=', 'servicios.id')
                ->join('users', 'users.id', '=', 'subscripciones.id_usuario')
                ->select(DB::raw("pagos.se_pago AS 'fecha', servicios.nombre AS 'servicio', servicios.costo"))
                ->where('users.id', $id)
                ->get();
        return view('contador.historialPago', ['pagos' => $pago]);
    }

    public function subscripciones(){
        $subcripciones = DB::table('subscripciones')
            ->join('users', 'subscripciones.id_usuario', '=', 'users.id')
            ->join('servicios', 'subscripciones.id_servicio', '=', 'servicios.id')
            ->select(DB::raw("subscripciones.sub_fecha AS 'subscripcion', users.nombre AS 'cliente', servicios.nombre AS 'servicio', servicios.costo"))
            ->get();

            return view('contador.subscripciones', ['subscriptions' => $subcripciones]);
    }

    public function subscripcionFecha(Request $request){

        $subcripciones = DB::table('subscripciones')
        ->join('users', 'subscripciones.id_usuario', '=', 'users.id')
        ->join('servicios', 'subscripciones.id_servicio', '=', 'servicios.id')
        ->select(DB::raw("subscripciones.sub_fecha AS 'subscripcion', users.nombre AS 'cliente', servicios.nombre AS 'servicio', servicios.costo"))
        ->where('subscripciones.sub_fecha', $request->fecha)
        ->get();
        return view('contador.subscripcionesFecha', ['subscriptions' => $subcripciones]);  
    }
}
