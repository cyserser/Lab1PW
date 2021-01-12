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

    public static function getFriendCount(){
        $friend = self::getAllFriend();
        return $friend->count();
    }

    public function seguirSocial($id){

        $id_user = session('user');
        $friend = new Friends();

        $friend->id_user = $id_user ;
        $friend->id_friend = $id;
        $friend->save();

        session(["idFriend" => $id]);
        return redirect()->to("miembros");

    }

    public static function comprobarBond($id){
        $id_user = session('user');

        if( Friends::where('id_user','=',$id_user) && Friends::where('id_friend','=',$id)->exists()){
            return true;
        } else {
            return false;
        }

    }

    public static function meSiguen($id){
        $id_user = session('user');

        if(Friends::where('id_user','=',$id)
            ->where('id_friend','=',$id_user)->exists()){
            return true;
        } else {
            return false;
        }

    }

    public function noSeguirSocial($id){

        $id_user = session('user');

        Friends::where('id_user','=',$id_user) && Friends::where('id_friend','=',$id)->delete();


        return redirect()->to("miembros");

    }

    function postMessage(){


    }
}
