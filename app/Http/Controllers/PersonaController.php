<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\MBuroCredito;

use App\Direccion;
use \PDF;
use Carbon\Carbon;

use App\TarjetasPersona;
use App\mcredito;
use phpDocumentor\Reflection\Types\Array_;


class PersonaController extends Controller
{
    public function tarjetas(){
        return view('asignarTarjetas');
    }
    public function asignartDebito(){

    }
    public function asignartCredito(Request $request){
        $tarjeta = new TarjetasPersona();
        $tarjeta->numero = $request->numero;
        $tarjeta->fecha = $request->fecha;
        $tarjeta->tipo = $request->tipo;
        $tarjeta->id_personas = $request->id;
        $tarjeta->save();


        $persona = Persona::where('id','=',$request->id)->with('tarjeta')->get();
        return $persona;
    }
    public function personas()
    {

        $personas = Persona::all();
        return $personas;
    }




    public function verificarBuro(Request $request){
        
            if($request->rfc != null)
            {
                $personaBuro = MBuroCredito::where('rfc', '=', $request->rfc)->with('instituciones')->get();
    
            }
            if($request->curp != null){
                $personaBuro = MBuroCredito::where('curp', '=', $request->curp)->with('instituciones')->get();
            }
            
            
                if($request->fecha_nacimiento != null){
                $personaBuro = MBuroCredito::where('fecha_nacimiento', '=', $request->fecha_nacimiento)->with('instituciones')->get();
            }
            
             if($request->nombre != null){
                $personaBuro = MBuroCredito::where('nombre', '=', $request->nombre)->with('instituciones')->get();
            }
        $persona = Persona::where('rfc', '=', $request->rfc)
            ->orWhere('curp','=',$request->curp)
            ->orWhere(function($q) use ($request){
                $q->where('fecha_nacimiento','=', $request->date);
                $q->where('nombre','=', $request->nombre);
            })->get();
        $rv=0;
        $hr='#';
        foreach ($personaBuro as $key => $a) {
            $rv=$a['adeudo']+$rv;
        }
        $x="no";
        $credito="red";
        $rv=1000;
        if($rv<=1000)
        {
            $credito="green";
            $hr='asignarcredito/'.$persona['0']['id'];
            $x="si";
        }
        else {
            if ($rv<=3000)
            $credito ="yellow";
            $hr='asignarcredito/'.$persona['0']['id'];
            $x="si";
        }



        return response()->json([
            'success' => true,
            'credito' => $x,
            'personaBuro' => $personaBuro,
            'persona' => $persona,
            'color'=>$credito,
            'href'=>$hr
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
        $id = Persona::all()->last();
        $direccion->id_persona = $id['id'];

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
            $direccion->colonia = $colonia;
        }
        if ($ciudad != null) {
            $direccion->ciudad = $ciudad;
        }
        if ($estado != null) {
            $direccion->estado = $estado;
        }
        if ($pais != null) {
            $direccion->pais = $pais;
        }

        $direccion->save();
        return $persona;

    }

    public function checarburo(Request $request)
    {
        if($request->rfc != null)
        {
            $persona = MBuroCredito::where('rfc', '=', $request->rfc)->with('instituciones')->get();

        }
        if($request->curp != null){
            $persona = MBuroCredito::where('curp', '=', $request->curp)->with('instituciones')->get();
        }
        
        
            if($request->fecha_nacimiento != null){
            $persona = MBuroCredito::where('fecha_nacimiento', '=', $request->fecha_nacimiento)->with('instituciones')->get();
        }
        
         if($request->nombre != null){
            $persona = MBuroCredito::where('nombre', '=', $request->nombre)->with('instituciones')->get();
        }
        
        


        return $persona;
    }

    public function checarburos(Request $request)
    {

        $persona = MBuroCredito::where('rfc', '=', '5234')->with('instituciones')->get();
        $persona2 = Persona::all()->last();
        $rv=0;
        foreach ($persona as $key => $a) {
            $rv=$a['adeudo']+$rv;
        }
        $credito="red";
        $rv=1000;
        if($rv<=1000)
        {
            $credito="green";
        }
        else {
            if ($rv<=3000)
                $credito ="yellow";
        }
        // $ee=$persona2['id'];
        dd($persona2['id']);
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
                $Prestamo['total']=$monto*($interes/100)*$anos+$monto;


                if ($Prestamo['pago']=="Mensual"){

                    $Prestamo['total_pagos']=$Prestamo['anos']*12;
                    $Prestamo['pagoapagar']=$Prestamo['total']/ $Prestamo['total_pagos'];
                    $p=$Prestamo['total'];
                    $auxiliar=$p;
                    for ($i = 1; $i < $Prestamo['total_pagos']+1; $i++){

                        $pagospendientes[$i]= $auxiliar-$Prestamo['pagoapagar'];
                        $auxiliar=$auxiliar-$Prestamo['pagoapagar'];
                        if ($auxiliar<=0){
                            $pagospendientes[$i]=0;
                        }
                    }

                }
                if ($Prestamo['pago']=="Quincenal"){

                    $Prestamo['total_pagos']=$Prestamo['anos']*24;
                    $Prestamo['pagoapagar']=$Prestamo['total']/ $Prestamo['total_pagos'];
                    $p=$Prestamo['total'];
                    $auxiliar=$p;
                    for ($i = 1; $i < $Prestamo['total_pagos']+1; $i++){

                        $pagospendientes[$i]= $auxiliar-$Prestamo['pagoapagar'];
                        $auxiliar=$auxiliar-$Prestamo['pagoapagar'];
                        if ($auxiliar<=0){
                            $pagospendientes[$i]=0;
                        }
                    }


                }

                return \PDF::loadView('pdf.reporte_calcularprestamo', compact('persona','persona','pagospendientes'), compact('Prestamo','Prestamo','date'))
                    ->stream('pdf.reporte_calcularprestamo');
            }
            else{
                return redirect('/prestamos');
            }

        }




    }
    public function credito(){
        return view('asignarCredito');
    }
    public function asignarcredito($id){
        $persona=Persona::where('id','=',$id)->get();
        return view('asignarPrestamo', compact('persona'));
    }

    public function guardarprestamo(Request $request){
        $credito = new mcredito();
        $credito->id_persona = $request->persona;
        $credito->prestamo = $request->prestamo;
        $credito->anos = $request->ano;
        $credito->interes = $request->interes;
        $credito->tipo_pago ="sd";
        $credito->pago = $request->pago;
        $credito->save();

        $persona=Persona::where('id','=',$request->persona)->get();

        $mb = new MBuroCredito();
        $mb->nombre = $persona['0']['nombre'];
        $mb->apellido_p = $persona['0']['apellido_p'];
        $mb->apellido_m = $persona['0']['apellido_m'];
        $mb->fecha_nacimiento = $persona['0']['fecha_nacimiento'];
        $mb->rfc =$persona['0']['rfc'];
        $mb->id_direcciones = 1;
        $mb->adeudo = $request->pago;
        $mb->id_instutuion =3;
        $mb->estado = "activo";
        $mb->comportamiento ="activo";
        $mb->curp = $persona['0']['curp'];
        $mb->save();


        return response()->json([
            'success' => true,
            'credito' => 'si'
        ]);
    }

}
