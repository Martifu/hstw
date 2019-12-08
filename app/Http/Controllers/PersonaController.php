<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\MBuroCredito;
use App\TarjetasPersona;

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
    public function verificaBuro(Request $request){
        $personaBuro = MBuroCredito::where('rfc', '=', $request->rfc)
            ->orWhere('curp','=',$request->curp)
            ->orWhere(function($q) use ($request){
                $q->where('fecha_nacimiento','=', $request->date);
                $q->where('nombre','=', $request->nombre);
            })->get();
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
            $hr='asignarcredito';
            $x="si";
        }
        else {
            if ($rv<=3000)
            $credito ="yellow";
            $hr='asignarcredito';
            $x="si";
        }


        return response()->json([
            'success' => true,
            'credito' => 'no',
            'personaBuro' => $personaBuro,
            'persona' => $persona,
            'color'=>$credito,
            'href'=>$hr
        ]);

    }
    public function traerpersonas()
    {
        $Usuarios= Persona::all();
        return view('DatosGenerales')->with('usuarios',$Usuarios);
    }
    public function actualizarinfo(Request $request)
    {
        $persona=Persona::find($request->id);
        $nombre = $request->nombre;
        $apellido_p = $request->apellido_p;
        $nacimiento = $request->nacimiento;
        $curp = $request->curp;
        $rfc = $request->rfc;

        if($nombre!=null){
            $persona->nombre=$nombre;
        }
        if($apellido_p!=null){
            $persona->apellido_p=$apellido_p;
        }
        if($nacimiento!=null){
            $persona->fecha_nacimiento=$nacimiento;
        }
        if($curp!=null){
            $persona->curp=$curp;
        }
        if($rfc!=null){
            $persona->rfc=$rfc;
        }
        $persona->save();
        return $persona;
    }
    public function borrarper(Request $request){
        $persona=Persona::find($request->id);
        $persona->delete();
    }
    public function traerpersona(Request $request){
        $persona=Persona::find($request->id);
        return $persona;
    }

    public function nuevapersona(Request $request){

        $persona= new Persona();
        $nombre = $request->nombre;
        $apellido_p = $request->apellido_p;
        $apellido_m = $request->apellido_m;
        $nacimiento = $request->nacimiento;
        $curp = $request->curp;
        $rfc = $request->rfc;

        if($nombre!=null){
            $persona->nombre=$nombre;
        }
        if($apellido_p!=null){
            $persona->apellido_p=$apellido_p;
        }
        if($apellido_m!=null){
            $persona->apellido_m=$apellido_m;
        }
        if($nacimiento!=null){
            $persona->fecha_nacimiento=$nacimiento;
        }
        if($curp!=null){
            $persona->curp=$curp;
        }
        if($rfc!=null){
            $persona->rfc=$rfc;
        }

        $persona->save();
        return $persona;

    }

    public function checarburo(Request $request)
    {
        $persona =  MBuroCredito::where('rfc', '=', $request->rfc)->with('instituciones')->get();


        return $persona;
    }

    public function checarburos(Request $request)
    {

        $persona = MBuroCredito::where('rfc', '=', '5234')->with('instituciones')->get();
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
        dd($credito);
    }
    public function credito(){
        return view('asignarCredito');
    }
    public function asignarcredito(){
        return view('asignarPrestamo');
    }



}
