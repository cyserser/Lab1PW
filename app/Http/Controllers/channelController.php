<?php

namespace App\Http\Controllers;

use App\Canales;
use App\Usuario;
use Illuminate\Http\Request;

class channelController extends Controller
{
    public function misCanalesS(){
        $id = session('user');
        $canales = Canales::where('id_user', $id)->get();
        //return view('user', ['canales' => $canales]);
        session(['canales'=>$canales]);
        return redirect()->to('user');
    }

    public function borrarCanal($id){
        $canales = Canales::where('id_user', $id)->get();
        $usuario = Usuario::find($canales);
        $usuario->delete();

    }

    public function nuevoCanal(){
        $nombreCanal = $_GET["nombreCanal"];
        $descripcion = $_GET["descripcion"];
        $longitud = $_GET["longitud"];
        $latitud = $_GET["latitud"];
        $nombreSensor = $_GET["nombreSensor"];


        $canal = new Canales;

        $canal->id_user = 7;
        $canal->nombreCanal = $nombreCanal;
        $canal->descripcion = $descripcion;
        $canal->longitud = $longitud;
        $canal->latitud = $latitud;
        $canal->nombreSensor = $nombreSensor;
        $canal->fecha = date('y-m-d H:i:s');

        $canal->save();

        return redirect('misCanales2'.$canal->id_user);

    }
}
