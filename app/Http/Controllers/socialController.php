<?php

namespace App\Http\Controllers;

use App\Friends;
use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Http\Request;

class socialController extends Controller
{
    public static function getAllUser(){
        return Usuario::all();
    }

    public static function getAllFriend(){
        return Friends::all();
    }

    public static function seguirSocial($id){

        $id_user = session('user');
        $friend = new Friends();

        $friend->id_user = $id_user ;
        $friend->id_friend = $id;
        $friend->save();

        return redirect()->to("miembros");

    }

    function postMessage(){


    }
}
