<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class PersonaController extends Controller
{
    public function personas() {

        $personas = Persona::all();
        return $personas;
    }

    public function verificaBuro(Request $request){
        $persona = Persona::where('curp','=',$request->curp)->get();

        return $persona;
    }
}
