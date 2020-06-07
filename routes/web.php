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

Route::get('/', function () {
    $servicio = DB::table('servicios')->get();
    
    return view('welcome', ['servicios' => $servicio]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'contador', 'middleware' => ['auth']], function () {
    Route::get('servicios',['as'=>'servicios','uses'=>'servicioController@allService']);
});

Route::group(['namespace' => 'contador', 'middleware' => ['auth', 'isContador']], function () {

    Route::get('nuevoServicio', 'servicioController@showServicioForm')->name('nuevoServicio');
    Route::post('nuevoServicio', 'servicioController@createServicio');
    // Route::get('editServicio', 'servicioController@saveNewServiceVersion')->name('editServicio');
    Route::get('servicio/{id}/modificar',['as'=>'editService','uses'=>'servicioController@newServiceVersion']);
    Route::get('servicio/{id}/update',['as'=>'editService','uses'=>'servicioController@updateServicioVista']);
    Route::post('servicio/{id}/salvar',['as'=>'saveNewVersion','uses'=>'servicioController@saveNewServiceVersion']);

  

    Route::get('subscripciones',['as'=>'subscripciones','uses'=>'detallesSubscritoresController@subscripciones']);
    Route::post('subscripcionesPorfecha',['as'=>'subscripcionesPorfecha','uses'=>'detallesSubscritoresController@subscripcionFecha']);

    Route::get('subscritores', 'detallesSubscritoresController@showSubcritores')->name('subscritores');
    Route::get('subscritor/{id}',['as'=>'subscritor','uses'=>'detallesSubscritoresController@detalleSubscritor']);
    Route::get('subscritor/{id}/pagos',['as'=>'subscritor-pagos','uses'=>'detallesSubscritoresController@pagoDetalles']);

    Route::get('lista-contactos',['as'=>'contactos','uses'=>'contacto@index']);

    Route::get('sendMail',['as'=>'sendMail','uses'=>'contacto@index']);

    // Route::resource('mensajeria', 'envioMensajeControler');
    Route::resource('mensajeria', 'envioMensajeController');  

    Route::get('servicioStatus', ['as' => 'status', 'uses' => 'servicioController@BorradoLogico']);
    Route::resource('pays', 'pagosController');
});

Route::group(['namespace' => 'subscritor', 'middleware' => ['auth', 'isSubscritor']], function () {
    
    Route::get('pagos',['as'=>'pagos','uses'=>'pagos@index']);
    
    Route::get('account/stauts',['as'=>'estadoCuenta','uses'=>'pagos@cuantaStatus']);
    Route::post('account/cuenta',['as'=>'cuentaUpdate','uses'=>'cuenta@nuevoSaldo']);
    //metodo ejecutado por ajax 
    // Route::get('account/subscripcion/{id}',['as'=>'subscripcion','uses'=>'subscripcion@index']);
    Route::get('account/subscripcion/{id}',['as'=>'subscripcion','uses'=>'subscripcion@index']);
    // Route::post('account/subscripcion/{id}/make',['as'=>'Dosubscripcion','uses'=>'subscripcion@makeSubscripcion']);
    Route::post('account/subscripcion/make',['as'=>'Dosubscripcion','uses'=>'subscripcion@makeSubscripcion']);
    Route::get('account/subscripcion/',['as'=>'subs','uses'=>'subscripcion@hasSubscription']);
    Route::post('account/subscripcion/{id}/pay',['as'=>'subs-pay','uses'=>'subscripcion@paySubscription']);

    
});
