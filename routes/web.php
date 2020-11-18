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

Route::get('/misCanales', 'channelController@misCanales');

Route::get('getDatos','registerController@getDatos');

Route::get('/nuevoCanal','channelController@nuevoCanal');

Route::get('procesarLogin','loginController@procesarLogin');
