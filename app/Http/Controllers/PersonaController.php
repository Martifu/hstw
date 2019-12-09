<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\MBuroCredito;
use App\Direccion;
use \PDF;
use Carbon\Carbon;

class PersonaController extends Controller
{

    public function personas()
    {

        $personas = Persona::all();
        return $personas;
    }

    public function verificaBuro(Request $request)
    {
        $persona = Persona::where('curp', '=', $request->curp)->get();


        return response()->json([
            'success' => true,
            'credito' => 'no',
            'persona' => $persona
        ]);

    }

    public function traerpersonas()
    {
        $Usuarios = Persona::all();
        return view('DatosGenerales')->with('usuarios', $Usuarios);
    }

    public function actualizarinfo(Request $request)
    {
        $persona = Persona::find($request->id);
        $nombre = $request->nombre;
        $apellido_p = $request->apellido_p;
        $nacimiento = $request->nacimiento;
        $curp = $request->curp;
        $rfc = $request->rfc;

        if ($nombre != null) {
            $persona->nombre = $nombre;
        }
        if ($apellido_p != null) {
            $persona->apellido_p = $apellido_p;
        }
        if ($nacimiento != null) {
            $persona->fecha_nacimiento = $nacimiento;
        }
        if ($curp != null) {
            $persona->curp = $curp;
        }
        if ($rfc != null) {
            $persona->rfc = $rfc;
        }
        $persona->save();
        return $persona;
    }

    public function borrarper(Request $request)
    {
        $persona = Persona::find($request->id);
        $persona->delete();
    }

    public function traerpersona(Request $request)
    {
        $persona = Persona::find($request->id);
        return $persona;
    }

    public function nuevapersona(Request $request)
    {

        $persona = new Persona();
        $nombre = $request->nombre;
        $apellido_p = $request->apellido_p;
        $apellido_m = $request->apellido_m;
        $nacimiento = $request->nacimiento;
        $curp = $request->curp;
        $rfc = $request->rfc;
        $direccion = new Direccion();
        $id = Persona::where("curp", "=", $curp)->select("id")->get();
        $direccion->id_persona = $id;
        $calle = $request->calle;
        $numero = $request->numero;
        $calles = $request->calles;
        $cp = $request->cp;
        $colonia = $request->colonia;
        $ciudad = $request->ciudad;
        $estado = $request->estado;
        $pais = $request->pais;

        if ($calle != null) {
            $direccion->calle = $calle;
        }
        if ($numero != null) {
            $direccion->numero = $numero;
        }
        if ($calles != null) {
            $direccion->calles = $calles;
        }
        if ($cp != null) {
            $direccion->cp = $cp;
        }
        if ($colonia != null) {
            $direccion->nombre = $colonia;
        }
        if ($ciudad != null) {
            $direccion->nombre = $ciudad;
        }
        if ($estado != null) {
            $direccion->nombre = $estado;
        }
        if ($pais != null) {
            $direccion->nombre = $pais;
        }
        if ($nombre != null) {
            $persona->nombre = $nombre;
        }
        if ($apellido_p != null) {
            $persona->apellido_p = $apellido_p;
        }
        if ($apellido_m != null) {
            $persona->apellido_m = $apellido_m;
        }
        if ($nacimiento != null) {
            $persona->fecha_nacimiento = $nacimiento;
        }
        if ($curp != null) {
            $persona->curp = $curp;
        }
        if ($rfc != null) {
            $persona->rfc = $rfc;
        }

        $persona->save();
        return $persona;

    }

    public function checarburo(Request $request)
    {
        $persona = MBuroCredito::where('rfc', '=', $request->rfc)->with('instituciones')->get();


        return $persona;
    }

    public function checarburos(Request $request)
    {
        $persona = MBuroCredito::where('rfc', '=', '5234')->with('instituciones')->get();
        dd($persona);
    }


    public function calcularprestamo(Request $request)
    {


        $curp_cliente = $request->get("curpCliente");
        $anos = $request->get("anos");
        $monto = $request->get("monto");
        $t_pago = $request->get("tp");
        $interes = $request->get("interes");
        if ($curp_cliente!=null) {
            $Prestamo=[
                'anos'=>'',
                'pago'=>'',
                'interes'=>'',
                'monto_solicitado'=>'',
                'total'=>'',
                'total_pagos'=>'',
                'pagoapagar'=>''
                ];

            $persona = Persona::where("curp", "=", $curp_cliente)->first();

            if ($persona!=null) {

                $date = Carbon::now();
                $date = $date->format('d-m-Y');

                $Prestamo['anos']=$anos;
                $Prestamo['monto_solicitado']=$monto;
                $Prestamo['pago']=$t_pago;
                $Prestamo['interes']=$interes;
                $Prestamo['total']=$monto*($interes/100)+$monto;

                if ($Prestamo['pago']=="Mensual"){

                    $Prestamo['total_pagos']=$Prestamo['anos']*12;
                    $Prestamo['pagoapagar']=$Prestamo['total']/ $Prestamo['total_pagos'];

                }
                if ($Prestamo['pago']=="Quincenal"){

                    $Prestamo['total_pagos']=$Prestamo['anos']*24;


                }

                return \PDF::loadView('pdf.reporte_calcularprestamo', compact('persona','persona'), compact('Prestamo','Prestamo','date'))
                    ->stream('pdf.reporte_calcularprestamo');
            }
            else{
                return redirect('/prestamos');
            }
        }
    }
}
