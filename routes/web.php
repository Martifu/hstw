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

Route::post('/registrar','PersonaController@nuevapersona');

Route::post('calcularprestamo', "PersonaController@calcularprestamo");

Route::get('/prestamos',function (){
    return view('AsignarPrestamos');
});
Route::get('/tarjetas',function (){
    return view('asignarTarjetas');
});
Route::post('verificar-buro', 'PersonaController@verificaBuro');
Route::post('/tcredito','PersonaController@asignartCredito');

Route::get('/gestionarclientes',['middleware'=> 'autenticacion','uses'=>'PersonaController@traerpersonas']);
Route::get('/traerpersonas','PersonaController@personas');
Route::POST('/actualizarpersona','PersonaController@traerpersona');
Route::POST('/actualizar','PersonaController@actualizarinfo');
Route::post('/borrarpersona','PersonaController@borrarper');

Route::get('/tarjetas',['middleware'=>'autenticacion','uses'=>'PersonaController@tarjetas']);

Route::post('verificar-buro', 'PersonaController@verificaBuro');
Route::get('/', ['middleware'=>'autenticacion','uses'=>'AdministradorController@vistaInicio']);
Route::post('checarburo', 'PersonaController@checarburo');
Route::get('checarburos', 'PersonaController@checarburos');

Route::get('/login', function ()
{
   return view('login');
});

Route::get('cerrarsesion','AdministradorController@cerrarSesion');

Route::get('/cobranza', ["middleware"=>"autenticacion", "uses" => "cobranzaController@personas_deuda"]);
Route::post('getdeudascliente', "cobranzaController@getdeudas");

Route::get('pdf','reportespdfController@invoice');

Route::get('/ingresarusuario','AdministradorController@verificarusuario');

Route::get('/reportes', ['middleware'=>'autenticacion','uses'=>'reportespdfController@vistaReporte']);

Route::post('generarReporte', "reportespdfController@reporte");

#BURO CREDITO

Route::get('/burocredito',['middleware'=>'autenticacion','uses'=>"BuroCreditoController@PersonasBuro"]);
Route::post('reporte_buros','BuroCreditoController@reporte');
Route::post('GenerarReporteBuro', "BuroCreditoController@reporte");







// Esta no hacerle caso es la vista que habia creado
Route::get('/basedani', function ()
{
   return view('baseAdministradorcopia');
});




Route::get('/credito','PersonaController@credito');
Route::get('/asignarcredito/{id}','PersonaController@asignarcredito');

Route::post('/guardarprestamo', "PersonaController@guardarprestamo");

