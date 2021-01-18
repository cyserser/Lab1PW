<?php

namespace App\Http\Controllers;

use App\Friends;
use App\Http\Controllers\Controller;
use App\Messages;
use App\Profile;
use App\Usuario;
use Illuminate\Http\Request;

class socialController extends Controller
{
    public static function getAllUser()
    {
        return Usuario::all();
    }

    public static function getAllFriend()
    {
        return Friends::all();
    }

    public static function getFriendCount()
    {
        $friend = self::getAllFriend();
        return $friend->count();
    }

    public function seguirSocial($id)
    {

        $id_user = session('user');
        $friend = new Friends();

        $friend->id_user = $id_user;
        $friend->id_friend = $id;
        $friend->save();

        session(["idFriend" => $id]);
        return redirect()->to("miembros");

    }

    public static function comprobarBond($id)
    {
        $id_user = session('user');

        if (Friends::where('id_user', '=', $id_user)
            ->where('id_friend', '=', $id)->exists()) {
            return true;
        } else {
            return false;
        }

    }

    public static function meSiguen($id)
    {
        $id_user = session('user');

        if (Friends::where('id_user', '=', $id)
            ->where('id_friend', '=', $id_user)->exists()) {
            return true;
        } else {
            return false;
        }

    }

    public function noSeguirSocial($id)
    {

        $id_user = session('user');

        Friends::where('id_user', '=', $id_user) && Friends::where('id_friend', '=', $id)->delete();


        return redirect()->to("miembros");

    }

    public static function getAllMessages()
    {
        return Messages::all();
    }

    public static function getAllMessagesReverse()
    {
        return Messages::all()->reverse();
    }

    public static function getPrivateMessages($id)
    {
        return Messages::all()->where("auth", "=", $id);
    }

//    public function ajaxMensajes()
//    {
//        $messagesAll=self::getAllMessages();
//        $usersAll=self::getAllUser();
//        $userLogged = session('user');
//        foreach ($messagesAll as $message) {
//            if ($message->auth == session('user')) {
//                foreach ($usersAll as $user) {
//                    if ($user->id == $message->recip) {
//                        if ($message->pm == "public") {
//                            return $userLogged." envia a ". $user->nombre." el mensaje ".$message->message." a las ".$message->fecha;
//                        } else { // para whisper
//                            return $userLogged." envia a ". $user->nombre." el mensaje ".$message->message." a las ".$message->fecha;
//                        }
//                    }
//                }
//            }
//            // Mensajes que recibo yo en message de otros amigos
//            if ($message->recip == session('user')) {
//                foreach ($usersAll as $user) {
//                    if ($user->id == $message->auth) {
//                        return $userLogged." envia a ". $user->nombre." el mensaje ".$message->message." a las ".$message->fecha;
//                    }
//                }
//            }
//        }
//        return "Error";
//    }

    public function ajaxMensajes()
    {
        $messagesAll = self::getAllMessages();
        $messagesAllReverse = self::getAllMessagesReverse();
        $usersAll = self::getAllUser();
        $userLogged = session('user');
        $contador = 5; // muestra los 5 últimos mensajes...
        $stringFinal = "";
        foreach ($messagesAllReverse as $message) {
                foreach ($usersAll as $user) {
                    if ($user->id == $message->recip) {
                        if ($message->pm == "public") {
                            $stringNombre = "";
                            foreach ($usersAll as $userDos) {
                                if ($userDos->id == $message->auth) {
                                    $stringNombre = $userDos->nombre;
                                }
                            }
                            $stringFinal = $stringFinal . $stringNombre . " envia a " . $user->nombre . " el mensaje ( " . $message->message . ") a las " . $message->fecha."<br>";
                        }

                        if ($message->auth == session('user') && $message->pm != "public") {
                            $stringNombre = "";
                            foreach ($usersAll as $userDos) {
                                if ($userDos->id == session('user')) {
                                    $stringNombre = $userDos->nombre;
                                }
                            }
                            $stringFinal = $stringFinal . $stringNombre . " envia a " . $user->nombre . " el mensaje ( " . $message->message . ") a las " . $message->fecha."<br>";
                        }
                    }
                }

                if (--$contador == 0) break;

                if ($message->recip == session('user')) {
                    foreach ($usersAll as $user) {
                        if ($user->id == $message->auth) {
                            if ($message->pm == "private") {
                                $stringNombre = "";
                                foreach ($usersAll as $userDos) {
                                    if ($userDos->id == session('user')) {
                                        $stringNombre = $userDos->nombre;
                                    }
                                }
                                $stringFinal = $stringFinal . $stringNombre . " envia a " . $user->nombre . " el mensaje ( " . $message->message . ") a las " . $message->fecha."<br>";
                            }
                        }
                    }
                }
            }

        return $stringFinal;
    }

    public function sendMessage()
    {

        if (isset($_GET["textarea"], $_GET["radioButton"], $_GET["selector"])) {

            $id_user = session('user');

            $textarea = $_GET["textarea"];
            $radioButton = $_GET["radioButton"];
            $selector = $_GET["selector"];

            $message = new Messages();

            $userAll = self::getAllUser();
            foreach ($userAll as $user) {
                if ($user->nombre == $selector) {
                    $message->recip = $user->id;
                }
            }

            $message->auth = $id_user;
            $message->message = $textarea;
            $message->pm = $radioButton;
            $message->fecha = date('y-m-d H:i:s');

            $message->save();

            return redirect()->to("mensajes");

        } else {
            return "<h3>Ha habido un error</h3>";
        }

    }

    public static function getAllProfilesReverse(){
        return Profile::all()->reverse();
    }

    public static function getProfilesCount($id){
        if(Profile::where("id_user","=",$id)->exists()){
            return true;
        }
        return false;
    }

    public function procesarProfile(){
        if(isset($_POST['descripcion'])){
            $id = session('user');
            $descripcion = $_POST['descripcion'];
            $profile = new Profile();
            $profile->id_user = $id;
            $profile->text = $descripcion;
            $profile->save();
            session(['descripcion' => $descripcion]);
        }

        if (isset($_FILES['image']['name'])){

           // Eliminamos el antiguo
            if(file_exists("img/".session('name').".jpg")){
                unlink(public_path("img/".session('name').".jpg"));
            }

            $saveto = "img/".session('name').".jpg";
            move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
            $typeok = TRUE;

            switch($_FILES['image']['type'])
            {
                case "image/gif":   $src = imagecreatefromgif($saveto); break;
                case "image/jpeg":  // Both regular and progressive jpegs
                case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
                case "image/png":   $src = imagecreatefrompng($saveto); break;
                default:            $typeok = FALSE; break;
            }

            if ($typeok)
            {
                list($w, $h) = getimagesize($saveto);

                $max = 100;
                $tw  = $w;
                $th  = $h;

                if ($w > $h && $max < $w)
                {
                    $th = $max / $w * $h;
                    $tw = $max;
                }
                elseif ($h > $w && $max < $h)
                {
                    $tw = $max / $h * $w;
                    $th = $max;
                }
                elseif ($max < $w)
                {
                    $tw = $th = $max;
                }

                $tmp = imagecreatetruecolor($tw, $th);
                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
                imageconvolution($tmp, array(array(-1, -1, -1),
                    array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
                imagejpeg($tmp, $saveto);
                imagedestroy($tmp);
                imagedestroy($src);
            }
        }
        return redirect()->to("myIoTsocial")->with('exito', 'open');
    }
}
