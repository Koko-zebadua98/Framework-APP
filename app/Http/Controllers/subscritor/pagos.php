<?php

namespace App\Http\Controllers\subscritor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\account;

class pagos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        
        $pagos = DB::table('pagos')
        ->join('subscripciones', 'pagos.id_subscripcion', '=', 'subscripciones.id')
        ->join('servicios', 'subscripciones.id_servicio', '=', 'servicios.id')
        ->join('users', 'users.id', '=', 'subscripciones.id_usuario')
        ->select(DB::raw("pagos.se_pago AS 'fecha', servicios.nombre AS 'servicio', servicios.costo"))
        ->where('users.id', $id_user)
        ->get();

        return view('subscritor.subscritorPagos', ['pays' => $pagos]);
    }

    /**
     * Estado de cuenta || solo puede ver
     */

     public function cuantaStatus(){
        $actual_user = Auth::user()->id;
        $saldo_usuario = account::where('id_user', '=', $actual_user)->first();
        $saldo = $saldo_usuario->saldo;
        return view('subscritor.cuentaStatus', compact('saldo'));
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
