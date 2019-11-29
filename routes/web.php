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
Route::get('/personas','PersonaController@traerpersonas');
Route::POST('/actualizarpersona','PersonaController@traerpersona');
Route::POST('/actualizar','PersonaController@actualizarinfo');
Route::post('/borrarpersona','PersonaController@borrarper');

Route::get('/tarjetas',function (){
    return view('asignarTarjetas');
});
Route::post('verificar-buro', 'PersonaController@verificaBuro');
Route::get('/', function ()
{
    return view('login');
});

Route::post('checarburo', 'PersonaController@checarburo');
Route::get('checarburos', 'PersonaController@checarburos');

Route::get('/login', function ()
{
   return view('login');
});

Route::get('/cobranza', "AdministradorController@deudas");

Route::get('pdf','reportespdfController@invoice');

Route::get('/ingresarusuario','AdministradorController@verificarusuario');

Route::get('/reportes', function ()
{
   return view('generarReportes');
});



// Esta no hacerle caso es la vista que habia creado
Route::get('/basedani', function ()
{
   return view('baseAdministradorcopia');
});

