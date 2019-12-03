<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use App\Administrador;
use Illuminate\Support\Facades\Session;

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
            Session::put('usuario', $correo);
            $respuesta = ["mensaje" => "Bienvenido", "status"=>"200"];
            return $respuesta;
        }
        else {
            $respuesta = ["mensaje" => "Error al inicar sesion, usuarion incorrecto o password", "status"=>"400"];
            return $respuesta;
        }
    }

    function cerrarSesion()
    {
        Session::flush();
        return view('DatosGenerales');
    }

}
