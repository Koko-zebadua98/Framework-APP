<?php

namespace App\Http\Controllers\contador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mail\MensajeMail;
use Illuminate\Support\Facades\Mail;
use DB;
class envioMensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $contacto =  User::where('role', '=', 1)->first();
    $contactos =  DB::table('users')->where('role', '=', '1')->get();
    // dd($contactos);
        return view('contador.prueba', ['contactos' => $contactos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = request()->validate([
            'contenido' => 'required',
            'subject' => 'required'
        ]);

        $emails = $request->contactos;
        Mail::to($emails)->send(new MensajeMail($data));

        $contactos =  DB::table('users')->where('role', '=', '1')->get();
        return view('contador.prueba', ['contactos' => $contactos]);
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
