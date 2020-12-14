<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class productController extends Controller
{

    public function newProduct(){

        if(isset($_GET["nombre"],$_GET["descripcion"],$_GET["precio"],$_GET["fecha"])) {

            $nombreProducto = $_GET["nombre"];
            $descripcion = $_GET["descripcion"];
            $precio = $_GET["precio"];
            $fecha = $_GET["fecha"];

            $product = new Product();

            $product->nombre = $nombreProducto;
            $product->descripcion = $descripcion;
            $product->precio = $precio;
            $product->fecha = $fecha;


            $product->save();

            return redirect('myIoTshop');

        } else {

            return "<h3>Rellene todos los campos </h3>";
        }



    }
}
