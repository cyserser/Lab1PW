<?php

namespace App\Http\Controllers;

use App\Canales;
use App\Usuario;
use App\datosSensores;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\TestFixture\C;


class channelController extends Controller
{
    // Funcionalidad de mostrar los canales del usuario logeado
    public function myChannels(){
        $id = session('user');
        $name = session('name');  // para pasar el nombre
        $canales = Canales::where('id_user', $id)->get();
        session(['canales'=>$canales]);
        session(['usuarios'=>$name]);  // para pasar el nombre

        return redirect()->to('user');
    }

    // Funcionalidad de eliminar canal dado un $id
    public function deleteChannel($id){
        datosSensores::where('id_canal',$id)->delete();
        Canales::where('id', $id)->delete();
        return redirect()->to("myChannels");

    }

    // Funcionalidad de logout
    public function cerrarSession(){
        session()->flush();
        return redirect()->to("index");
    }

    // Funcionalidad de mostrar todos los canales
    public function channel(){
        $canalesAll = Canales::all();
        $usuariosAll = Usuario::all();
        session(['channels' => $canalesAll]);
        session(['users' => $usuariosAll]);
        return redirect()->to('canales');

    }
    // Funcionalidad AJAX número de usuarios registrados
    public function ajaxUsers(){
        $user = Usuario::all();
        $numberOfUser = count($user);
        $cadena = "Numero usuarios: " . $numberOfUser . "<br>";
        return $numberOfUser;
    }

    // Funcionalidad AJAX número de usuarios registrados
    public function ajaxChannels(){
        $channel = Canales::all();
        $numberOfChannel = count($channel);
        $cadena = "Numero usuarios: " . $numberOfChannel . "<br>";
        return $numberOfChannel;
    }

    // Funcionalidad AJAX número de usuarios registrados
    public function ajaxLastUser(){
        $user = Usuario::all();
        if($user->count() != 0) {
            return $user[count($user)-1]->nombre;
        } else {
            return "null";
        }
    }

    // Para coger el último canal
    public static function getLastChannel(){
        $channel = Canales::all();
        if($channel->count() != 0) {
            return $channel[count($channel)-1];
        } else {
            return 0;
        }

    }
    // Para coger el penultimo canal
    public static function getSecondLastChannel(){
        $channel = Canales::all();
        if($channel->count() != 0) {
            return $channel[count($channel) - 2];
        } else {
            return 0;
        }
    }

    // Para coger el número de canales
    public static function getNumberOfChannels(){
        return Canales::all()->count();
    }

    // Para coger todos los usuarios
    public static function getUsers(){
        return Usuario::all();
    }

    // Para coger todos los canales
    public static function getChannels(){
        return Canales::all();
    }

    public function procesarWebServiceRest(){

        if(isset($_GET["datetime"],$_GET["datetime2"])){

            $from = $_GET["datetime"];
            $to = $_GET["datetime2"];

//            session(['datetime' => $from]);
//            session(['datetime2' => $to]);


            return redirect()->to("requestWebServiceRest"."1");

        } else {

            return "<h3>No ha introducido las fechas</h3>";

        }

    }

    // Crear servicio JSON
    public function webServiceRest($query){
//        $from = date('2020-12-02');
//        $to = date('2020-12-06');
//        $from = session('datetime');
//        $to = session('datetime2');

        $from = substr($query,0,10);
        $to = substr($query,10,10);
        $id = substr($query,20);

        $data = datosSensores::where('id_canal',$id)->wherebetween('fecha', [$from, $to])->get();

        header('Content-type: application/json');

        return json_encode($data);

    }

    // Consumir servicio JSON
    public function requestWebServiceRest($id){

        if(isset($_GET["datetime"],$_GET["datetime2"])) {

            $from = $_GET["datetime"];
            $to = $_GET["datetime2"];

            $query = $from.$to.$id;

            $request = "http://lab1pw.test/webServiceRest".$query;
            $response = file_get_contents($request);
            $status_line = explode(' ', $http_response_header[0], 3);
            $status_code = $status_line[1];

            if ($status_code == 200) {
                $json = json_decode($response);
                if (json_last_error() == JSON_ERROR_NONE) {
                    $contador = 0;
                    foreach ($json as $item) {
                        $contador++;

                        echo "Read number: " . $contador . " = " . $item->dato . "<br>";

                    }
                    if ($contador == 0) {
                        echo "No hay lecturas de datos";
                    }
                }
            } else {
                echo "Falló la llamada al Web Service. Error=" . $status_code;
            }

        } else {

            return "<h3>No ha introducido las fechas</h3>";
        }

    }

    // Funcionalidad Graficos
    public function getDatosSensores($id){
        // Datos para la gráfica
        session(['idCanal'=>$id]);
        $user = datosSensores::where('id_canal',$id)->get(); //y luego cambiar rawdata por $user

        //Ajustar tiempo
        for ($i = 0; $i < count($user); $i++) {
            $time = $user[$i]["fecha"];
            $user[$i]["fecha"] = strtotime($time) * 1000;
        }

        //Quitar el array asociativo
        $data=array();
        $i=0;
        foreach ($user as $fila) {
            $data[$i][0] = $fila['fecha'];
            $data[$i][1] = floatval($fila['dato']);
            $i++;

        }

        header('Content-type: application/json');

        return json_encode($data);
    }

    public function newChannel(){

        if(isset($_GET["nombreCanal"],$_GET["descripcion"],$_GET["longitud"],$_GET["latitud"],$_GET["nombreSensor"])) {

            $nombreCanal = $_GET["nombreCanal"];
            $descripcion = $_GET["descripcion"];
            $longitud = $_GET["longitud"];
            $latitud = $_GET["latitud"];
            $nombreSensor = $_GET["nombreSensor"];

            $id = session('user');
            $canal = new Canales;

            $canal->id_user = $id;
            $canal->nombreCanal = $nombreCanal;
            $canal->descripcion = $descripcion;
            $canal->longitud = $longitud;
            $canal->latitud = $latitud;
            $canal->nombreSensor = $nombreSensor;
            $canal->fecha = date('y-m-d H:i:s');

            $canal->save();

            return redirect('myChannels');

        } else {

            return "<h3>Rellene todos los campos </h3>";
        }



    }
}
