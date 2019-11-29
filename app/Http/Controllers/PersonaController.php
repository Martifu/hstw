<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\MBuroCredito;


class PersonaController extends Controller
{
    public function personas()
    {

        $personas = Persona::all();
        return $personas;
    }
    public function verificaBuro(Request $request){
        $persona = Persona::where('curp','=',$request->curp)->get();


        return response()->json([
            'success' => true,
            'credito' => 'no',
            'persona' => $persona
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
    public function checarburo(Request $request)
    {
        $persona =  MBuroCredito::where('rfc', '=', $request->rfc)->with('instituciones')->get();

        return $persona;
    }

    public function checarburos(Request $request)
    {
        $persona = MBuroCredito::where('rfc', '=', '5234')->with('instituciones')->get();
        dd($persona);}
}
