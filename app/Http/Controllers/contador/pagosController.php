<?php

namespace App\Http\Controllers\contador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class pagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = DB::table('subscripciones')
        ->join('servicios', 'servicios.id', '=', 'subscripciones.id_servicio')
        ->join('users', 'users.id', '=', 'subscripciones.id_usuario')
        ->select('subscripciones.renovacion', 'servicios.nombre', 'servicios.costo', 'servicios.img1', 'subscripciones.id', 'servicios.monto_mora', 'users.nombre AS usuario')
        ->where('users.role', 1)
        ->get();

        $current = Carbon::now();
        $hoy = Carbon::now();

            

            // ya va a pagar (no aun falta = flase)
            foreach ($servicios as $key => $value) {
                $fecha = Carbon::create($value->renovacion);
                $falta = $hoy->lessThanOrEqualTo($fecha);
                
                 $servicios[$key]->es_hora = $falta; 
            }

        return view('contador.pagos', ['servicios' => $servicios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
