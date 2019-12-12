<?php

namespace App\Http\Controllers;

use App\fechas_pago;
use App\mcredito;
use Carbon\Carbon;
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
        $credito_persona = mcredito::where('id_persona','=',$id)->get();
        $id_credito =  $credito_persona[0]->id;
        $persona_pagos = fechas_pago::with('credito_fechas')->where('id_credito','=',$id_credito)->where('fechas',"<=",Carbon::now())->get();
        $fechastotales = [];
        foreach ($persona_pagos as $fechas)
        {
            $fechastotales[] = Carbon::parse($fechas['fechas'])->addDay(2)->format('Y-m-d');
        }

        return $persona_pagos;
    }
}
