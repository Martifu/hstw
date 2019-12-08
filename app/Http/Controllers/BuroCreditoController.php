<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MburoCredito;
use App\Mburodirecciones;
use DB;

class BuroCreditoController extends Controller
{
    function PersonasBuro(Request $request)
    {
        $Direcciones = Mburodirecciones::with('calle')->where('id','=',$request->id)->get();
        $personas = MburoCredito::all();
        
     

        return view('Burocredito', compact("personas"));
    }

    function PersonasBuroReporte(Request $request)
    {
        $Direcciones = Mburodirecciones::with('calle')->where('id','=',$request->id)->get();
        $personas = MburoCredito::all();
        
     

        return view('reporteburo.reporte', compact("personas"));
    }



    public function reporte(Request $request)
    {
        $personas = MburoCredito::where('id',$request->id)->get();
        $fecha = date('Y-m-d');
        $invoice = "2222";
        $view = \View::make('reporteburo.reporte', compact('fecha', 'invoice', 'personas'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);   
       return $pdf->stream();
       return redirect('/burocredito');
    }


}

