<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class Lab1PWController extends Controller

{
    public function canales() {
        return view('canales');
    }

    public function misCanales() {
        return view('misCanales');
    }

}
