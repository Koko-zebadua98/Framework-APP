<?php

namespace App\Http\Controllers\contador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class contacto extends Controller
{
    public function index(){

        $contactos = User::where('role', '=', '1')->select('nombre', 'telefono')->get();
        return view('contador.listaContacto', ['contactos' => $contactos]);
    }
}
