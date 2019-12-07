<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MburoCredito;
use App\direcciones;

class BuroCreditoController extends Controller
{
    function PersonasBuro()
    {
    
        $personas = MburoCredito::all();
        return view('Burocredito', compact("personas"));
    }



    public function reporte(Request $request)
    {
       
        $fecha = date('Y-m-d');
        $invoice = "2222";
        $view = \View::make('reporteburo.reporte', compact('fecha', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);   
       return $pdf->stream();
       return redirect('/burocredito');
      
    

    }


}

