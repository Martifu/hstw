<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Persona;
use App\Mburodirecciones;

class BuroCreditoController extends Controller
{
    function PersonasBuro()
    {
        $personas = Persona::all();
        $direcciones = Mburodirecciones::all();
        return view('Burocredito', compact("personas","direcciones"));
    }

    function reporteburo(Request $request)
    {
    
        $ids = $request->ids;
        $personas = [];
        for ($i=0; $i<sizeof($ids) - 1; $i++) {
            $personas = Persona::all()->where('id', $ids[$i])->get();
            $personas[$i] = $personas[0];
        }
        $pdf = PDF::loadView('reporteburo.reporte', $data);
        return base64_encode($pdf->stream('invoice.pdf'));
    }
    
    
  



}

