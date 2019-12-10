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
        $direcciones = Mburodirecciones::all();
        $personas = MburoCredito::all();
        $instituciones = instituciones::all();




        return view('Burocredito', compact("personas", "direcciones"));
    }



    public function reporte(Request $request)
    {

       $personas = MburoCredito::where('id', $request->id)->with('direcciones','instituciones')->get();
      #$personas = MburoCredreturn $personas;
        $fecha = date('Y-m-d');
        $invoice = "2222";
        $mensaje = $request->mensaje;
        $data = ['personas' => $personas,'fecha'=> $fecha, 'mensaje' => $mensaje];
        $pdf = PDF::loadView('reporteburo.reporte', $data);
        return base64_encode($pdf->stream('invoice.pdf'));

    }




}

