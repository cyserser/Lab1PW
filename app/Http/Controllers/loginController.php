<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class loginController extends Controller
{

    public function procesarLogin(){

        if(isset($_GET["email"], $_GET["password"])){

            $email = $_GET["email"];
            $password = $_GET["password"];

            $usuario = Usuario::where('email', $email) -> get();

            if($usuario == '[]'){ // si esta vacio o no existe

                return "<h3>El email no existe</h3>";

            }

            if($usuario[0]['email'] == $email && $usuario[0]['passwd'] == md5($password)){

                $id = $usuario[0]['id'];
                $name = $usuario[0]['nombre'];
                $email = $usuario[0]['email'];

                session(['user' => $id]);
                session(['name' => $name]);
                session(['email'=> $email]);

                return redirect()->to('myChannels');

            } else {
                return "<h3>La contraseña es incorrecta</h3>";
            }

        } else {

            return "<h3>Rellene todos los campos</h3>";
        }

    }

}
