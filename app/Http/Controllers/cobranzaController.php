<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class cobranzaController extends Controller
{
    function personas_deuda()
    {
        $personas = Persona::all();
        return view('cobranza', compact("personas"));
    }
    function getdeudas(Request $request)
    {
        $id = $request->get('id');
        $persona = Persona::where("id","=",$id)->get();
        $personas = Persona::all();

        return $personas;
    }
}
