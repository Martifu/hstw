<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\MburoCredito;
use App\instituciones;
use App\Mburodirecciones;
use DB;
use Illuminate\Support\Str;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;
use Response;
use Barryvdh\DomPDF\Facade as PDF;

class BuroCreditoController extends Controller
{
    function PersonasBuro(Request $request)
    {
        $Direcciones = Mburodirecciones::all();
        $personas = MburoCredito::all();
        $instituciones = instituciones::all();
     
        
     

        return view('Burocredito', compact("personas"));
    }



    public function reporte(Request $request)
    {
        $direcciones = Mburodirecciones::all();
       $personas = MburoCredito::where('id', $request->id)->with('direcciones')->get();     
      # $personas = MburoCredito::all();

        $fecha = date('Y-m-d');
        $invoice = "2222";
        $view = \View::make('reporteburo.reporte', compact('fecha', 'invoice', 'personas'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);   
       return $pdf->stream();
       
    }


}

