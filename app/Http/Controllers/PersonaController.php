<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\MBuroCredito;


class PersonaController extends Controller
{
    public function personas()
    {

        $personas = Persona::all();
        return $personas;
    }

    public function verificaBuro(Request $request)
    {
        $persona = Persona::where('curp', '=', $request->curp)->get();

        return $persona;
    }
    public function checarburo(Request $request)
    {
        $persona =  MBuroCredito::where('rfc', '=', $request->rfc)->with('instituciones')->get();

        return $persona;
    }

    public function checarburos(Request $request)
    {
        $persona = MBuroCredito::where('rfc', '=', '5234')->with('instituciones')->get();
        dd($persona);
        return $persona;
    }
}
