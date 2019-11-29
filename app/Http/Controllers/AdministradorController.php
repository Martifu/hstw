<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use App\Administrador;

class AdministradorController extends Controller
{
    function verificarusuario(Request $request)
    {
        $correo =  $request->get('correo');
        $password =  $request->get('password');
        $administrador = Administrador::where('correo','=',$correo)->where('password',"=", $password)->first();
        $valor = $administrador == null ? 0 : 1;
        if ($valor)
        {
            $respuesta = ["mensaje" => "Bienvenido", "status"=>"200"];
            return $respuesta;
        }
        else {
            $respuesta = ["mensaje" => "Error al inicar sesion, usuarion incorrecto o password", "status"=>"400"];
            return $respuesta;
        }
    }

    function deudas()
    {
        $personas = Persona::all();
        return view('cobranza', compact("personas"));
    }
}
