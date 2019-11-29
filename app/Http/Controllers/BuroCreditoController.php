<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Persona;
use App\Mburodirecciones;

class BuroCreditoController extends Controller
{
    function PersonasBuro()
    {
        $personas = Persona::all();
        $direcciones = Mburodirecciones::all();
        return view('DatosBuro', compact("personas","direcciones"));
    }
}
