<?php

namespace App\Http\Controllers\contador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\servicio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class servicioController extends Controller
{
    public function showServicioForm(){
        return view('contador.newServicio');
    }

    public function BorradoLogico(Request $request){

        $servicio = servicio::findOrfail($request->servicio_Id);
        $servicio->active = $request->status;
        $servicio->save();

        return response()->json([
            'message' => 'Estado de Servicio Actualizado'
            ]);
    }

    public function createServicio(Request $request){
        // dd($request->all());
        $nuevo_servicio = New servicio;

        if($request->hasfile('img1')){
            $file1 = $request->file('img1');
            $file2 = $request->file('img2');
            $file3 = $request->file('img3');
            $extencion1 = $file1->getClientOriginalExtension();
            $extencion2 = $file2->getClientOriginalExtension();
            $extencion3 = $file3->getClientOriginalExtension();
            $filename1 = time() . '_1' . '.' . $extencion1;
            $filename2 = time() . '_2' . '.' . $extencion2;
            $filename3 = time() . '_3' . '.' . $extencion3;
            $file1->move('uploads/servicio/img/', $filename1);
            $file2->move('uploads/servicio/img/', $filename2);
            $file3->move('uploads/servicio/img/', $filename3);

            $nuevo_servicio->img1 = $filename1;
            $nuevo_servicio->img2 = $filename2;
            $nuevo_servicio->img3 = $filename3;
        }else{
            return 'NO';
        }
        $nuevo_servicio->nombre = $request->nombre;
        $nuevo_servicio->costo =  $request->costo;
        $nuevo_servicio->monto_mora = $request->mora;
        $nuevo_servicio->save();
        // $nuevo_servicio = servicio::create([
        //     'nombre' => $request->nombre,
        //     'img1' => $request->img1,
        //     'img2' => $request->img2,
        //     'img3' => $request->img3,
        //     'costo' => $request->costo,
        //     'monto_mora' => $request->mora
        // ]);
        return 'OK';
    }

    public function allService(){

        $todos = servicio::all();

        if(Auth::user()->role == 1){
            $id = Auth::user()->id;
            $userSubs = DB::table('servicios')
            ->join('subscripciones', 'servicios.id', '=', 'subscripciones.id_servicio')
            ->join('users', 'users.id', '=', 'subscripciones.id_usuario')
            ->select('servicios.id')
            ->where('users.id', $id)
            ->get();

            return view('contador.serviciosAll', ['servicios' => $todos, 'subs' => $userSubs]);
        }else{
            return view('contador.serviciosAll', ['servicios' => $todos]);
        }

        
    }

    //metodo que es utilizado para salvar una nueva version de un Servicio
    public function saveNewServiceVersion(Request $request, $id)
    {
        //buscar si el servicio tiene otras versiones
        //buscar ne la base de datos el url de las imagenes que no cambiaron e actualiza

        $actual = servicio::where('id', '=', $id)->first();
        $save_new = new servicio;
        $save_new->nombre = $request->nombre;
        $save_new->costo = $request->costo;
        $save_new->monto_mora = $request->mora;       
        $save_new->img1 = $actual->img1;
        $save_new->img2 = $actual->img2;
        $save_new->img3 = $actual->img3;

        // Buscar la ultima version de este servicio 

        $save_new->version = $request->version + 1;

        $save_new->save();

        return view('home');
    }

    public function newServiceVersion(Request $request,$id){

        $servicio = servicio::where('id', '=', $id)->first();
         
        return view('contador.editServicio', compact('servicio', 'id'));
    }
}
