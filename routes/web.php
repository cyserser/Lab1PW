<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/index', function () {
   return view('index');
});

Route::get('/nuevoCanal', function () {
    return view('nuevoCanal');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/user', function () {
    return view('user');
});

Route::get('/canales', function () {
    return view('canales');
});

Route::get('/getDatosGrafica{id}', function ($id) {
    return view('datosSensores', ['idCanal'=>$id]);
});

Route::get('/getWebServiceRest{id}', function ($id) {
    return view('webServiceForm', ['idCanalRest'=>$id]);
});

Route::get('/myIoTshop', function () {
    return view('myIoTshop');
});

Route::get('/myIoTsocial', function () {
    return view('myIoTsocial');
});

Route::get('/ajaxUsers', 'channelController@ajaxUsers');

Route::get('/ajaxChannels', 'channelController@ajaxChannels');

Route::get('/ajaxLastUser', 'channelController@ajaxLastUser');

Route::get('/myChannels', 'channelController@myChannels');

Route::get('/getDatos','registerController@getDatos');

Route::get('/newChannel','channelController@newChannel');

Route::get('/channel','channelController@channel');

Route::get('/procesarLogin','loginController@procesarLogin');

Route::get('/deleteChannel/{id}','channelController@deleteChannel');

Route::get('/cerrarSession','channelController@cerrarSession');

Route::get('/getDatosSensores{id}','channelController@getDatosSensores');

Route::get('/requestWebServiceRest{id}','channelController@requestWebServiceRest');

Route::get('/webServiceRest{query}','channelController@webServiceRest');

Route::get('/procesarWebServiceRest','webServiceController@procesarWebServiceRest');





