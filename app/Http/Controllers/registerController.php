<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function getDatos() {

        if(isset($_GET["nombre"],$_GET["date"],$_GET["email"],$_GET["password"],$_GET["password"])){

            $nombre = $_GET["nombre"];
            $date = $_GET["date"];
            $email = $_GET["email"];
            $password = $_GET["password"];
            $password2 = $_GET["password2"];

            if (Usuario::where('email', '=', $email)->exists()) {

                return "<h3>El email ya existe</h3>";

            } else {

                $usuario = new Usuario;

                $usuario->nombre = $nombre;
                $usuario->email = $email;
                $usuario->passwd = md5($password);
                $usuario->fechaNacimiento = $date;
                $usuario->fecha = date('y-m-d H:i:s');

                $usuario->save();

                return view('login');

            }

        } else {

            return "<h3>No se han rellenado todos los datos</h3>";

        }



    }


}
