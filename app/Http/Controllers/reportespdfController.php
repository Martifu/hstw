<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class reportespdfController extends Controller
{
    function vistaReporte()
    {
        return view('generarReportes');
    }
    public function reporte(Request $request)
    {
        $numero_cliente = $request->get("numCliente");
        $nombre_cliente = $request->get("nomCliente");
        $fecha_cliente = $request->get("nacimiento_cliente");
        $rfc_cliente = $request->get("rfcCliente");
        $curp_cliente = $request->get("curpCliente");

        if ($numero_cliente) {
            $persona = Persona::where("id", "=", $numero_cliente)->first();
            $datos = $persona ? 1 : 0;
            if ($datos == 1) {
                $fecha = date('Y-m-d');
                $invoice = "2222";
                $view = \View::make('pdf.reporte', compact('fecha', 'invoice'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view, "UTF-8");
                return $pdf->stream();
            } else {
                return redirect('/reportes')->with('notificacion', 'No se encontro este usuario');
            }
        }
        elseif ($nombre_cliente and $fecha_cliente) {
            $persona = Persona::where("nombre", "=", $nombre_cliente)->where("fecha_nacimiento","=", "$fecha_cliente")->first();
            $datos = $persona ? 1 : 0;
            if ($datos == 1) {
                $fecha = date('Y-m-d');
                $invoice = "2222";
                $view = \View::make('pdf.reporte', compact('fecha', 'invoice'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->stream();
            } else {
                return redirect('/reportes')->with('notificacion', 'No se encontro este usuario');
            }
        }
        elseif ($curp_cliente) {
            $persona = Persona::where("curp", "=", $curp_cliente)->first();
            $datos = $persona ? 1 : 0;
            if ($datos == 1) {
                $fecha = date('Y-m-d');
                $invoice = "2222";
                $view = \View::make('pdf.reporte', compact('fecha', 'invoice'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->stream();
            } else {
                return redirect('/reportes')->with('notificacion', 'No se encontro este usuario');
            }
        }
        elseif ($rfc_cliente) {
            $persona = Persona::where("rfc", "=", $rfc_cliente)->first();
            $datos = $persona ? 1 : 0;
            if ($datos == 1) {
                $fecha = date('Y-m-d');
                $invoice = "2222";
                $view = \View::make('pdf.reporte', compact('fecha', 'invoice'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->stream();
            } else {
                return redirect('/reportes')->with('notificacion', 'No se encontro este usuario');
            }
        }


    }
}
