<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportespdfController extends Controller
{
    public function invoice()
    {
        $datos = $this->getData();
        $fecha = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.reporte', compact('datos', 'fecha', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }
    public function getData()
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }
}
