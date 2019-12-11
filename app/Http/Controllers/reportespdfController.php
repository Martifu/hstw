<?php

namespace App\Http\Controllers;

use App\mcredito;
use Illuminate\Http\Request;
use App\Persona;

class reportespdfController extends Controller
{
    public function reporte(Request $request)
    {
        $numero_cliente = $request->get("numCliente");
        $nombre_cliente = $request->get("nomCliente");
        $fecha_cliente = $request->get("nacimiento_cliente");
        $rfc_cliente = $request->get("rfcCliente");
        $curp_cliente = $request->get("curpCliente");

        if ($numero_cliente) {
            $persona = Persona::where("id", "=", $numero_cliente)->first();
            $prestamos = mcredito::all()->where('id_persona','=',$persona->id);
            $total = $prestamos[0]['prestamo']*($prestamos[0]['interes']/100) + $prestamos[0]['prestamo'];

            $datos = $persona ? 1 : 0;
            if ($datos == 1) {
                $fecha = date('Y-m-d');
                $view = \View::make('pdf.reporte', compact('persona', 'fecha', 'prestamos','total'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view, "UTF-8");
                return $pdf->stream();
            } else {
                return redirect('/reportes')->with('notificacion', 'No se encontro este usuario');
            }
        }
    }
}
