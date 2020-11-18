<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function getDatos() {

        $nombre = $_GET["nombre"];
        $date = $_GET["date"];
        $email = $_GET["email"];
        $password = $_GET["password"];
        $password2 = $_GET["password2"];

        $usuario = new Usuario;

        $usuario->nombre = $nombre;
        $usuario->email = $email;
        $usuario->passwd = md5($password);
        $usuario->fechaNacimiento = $date;
        $usuario->fecha = date('y-m-d H:i:s');
        $usuario->save();

        return view('mostrarDatos');
    }
}
