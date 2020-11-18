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

            if($usuario[0]['passwd'] == md5($password)){
                $id = $usuario[0]['id'];

                session(['user' => $id]);

                return redirect()->to('misCanalesS');
            }

        } else {

            return "<h3>Rellene todos los campos</h3>";
        }

        return "<h3>El email no existe</h3>";

    }

}

/*public function login() {

    $users = Usuario::all();

    $email = $_GET["email"];

    foreach($users as $usuario){

        if($usuario->getAttribute('email') == $email ){

            return view('misCanales');
        }
    }
    return redirect('login');
}*/
