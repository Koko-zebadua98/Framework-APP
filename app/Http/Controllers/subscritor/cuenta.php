<?php

namespace App\Http\Controllers\subscritor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\account;
use Illuminate\Support\Facades\Auth;

class cuenta extends Controller
{
    // protected $redirectTo = '/home';

    public function nuevoSaldo(Request $request){

        $id_user = Auth::user()->id;
        
        $usuario = User::find($id_user);
        $cuenta = account::where('id_user', '=', $id_user)->first();
        $saldo = $request->saldo;
        $cuenta->saldo = $saldo;
        $cuenta->save();
        return view('subscritor.cuentaStatus', compact('saldo'));
    }
}
