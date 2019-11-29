<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
Route::get('/tarjetas',function (){
    return view('asignarTarjetas');
});
Route::get('/credito',function (){
    return view('asignarCredito');
});
Route::post('verificar-buro', 'PersonaController@verificaBuro');
Route::post('checarburo', 'PersonaController@checarburo');
Route::get('checarburos', 'PersonaController@checarburos');
Route::get('/', function () {
    return view('templates.master');
});

Route::get('/login', function ()
{
   return view('login');
});

Route::get('pdf','reportespdfController@invoice');

Route::get('/ingresarusuario','AdministradorController@verificarusuario');

Route::get('/reportes', function ()
{
   return view('generarReportes');
});

