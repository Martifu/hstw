<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class PersonaController extends Controller
{
    public function personas() {

        $personas = Persona::all();
        return $personas;
    }

    public function verificaBuro(Request $request){
        $persona = Persona::where('curp','=',$request->curp)->get();

        return $persona;
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
            $persona->save();
        }

    }
    public function borrarper(Request $request){
        $persona=Persona::find($request->id);
        $persona->delete();

    }



}
