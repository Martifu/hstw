<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportespdfController extends Controller
{
    public function reporte(Request $request)
    {
        $fecha = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.reporte', compact( 'fecha', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte.pdf', array('Content-Type' =>'application/pdf', 'Content-Transfer-Encoding' => 'Binary', 'Content-disposition' => 'attachment'));
    }
}
