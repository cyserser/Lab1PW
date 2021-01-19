<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function newProduct(){

        if(isset($_GET["nombreProducto"],$_GET["descripcion"],$_GET["precio"],$_GET["stock"], $_GET['imagen'],$_GET["date"])) {

            $nombreProducto = $_GET["nombreProducto"];
            $descripcion = $_GET["descripcion"];
            $precio = $_GET["precio"];
            $stock = $_GET["stock"];
            $imagen = $_GET["imagen"];
            $fecha = $_GET["date"];

            // Comprobando que el producto ya existe antes de crear otro nuevo
            $productosAll = self::getProducts();
            foreach($productosAll as $product){
                if($product->nombre == $nombreProducto ){
                    return "<h3>El producto ya existe!</h3>";
                }
            }

            $product = new Product();
            $product->nombre = $nombreProducto;
            $product->descripcion = $descripcion;
            $product->precio = $precio;
            $product->stock = $stock;
            $product->imagen = $imagen;
            $product->fecha = $fecha;
            $product->save();

            return redirect('myIoTshop');

        } else {

            return "<h3>Rellene todos los campos </h3>";
        }

    }

    public static function getProducts(){
        return Product::all();
    }

    public function editProduct($id){
        $product = Product::where('id', '=', $id)->first();

        if(isset($_GET["nombreProducto"],$_GET["descripcion"],$_GET["precio"],$_GET["stock"],$_GET["imagen"],$_GET["date"])) {
            $nombreProducto = $_GET["nombreProducto"];
            $descripcion = $_GET["descripcion"];
            $precio = $_GET["precio"];
            $stock = $_GET["stock"];
            $imagen = $_GET["imagen"];
            $fecha = $_GET["date"];

//          Comprobando que el producto existe, solo el que tenga ese id puede dejar el mismo nombre
            $productosAll = self::getProducts();
            foreach($productosAll as $productA){
                if($productA->id != $id){
                    if($productA->nombre == $nombreProducto ){
                        return "<h3>El producto ya existe!</h3>";
                    }
                }
            }

            $product->nombre = $nombreProducto;
            $product->descripcion = $descripcion;
            $product->precio = $precio;
            $product->stock = $stock;
            $product->imagen = $imagen;
            $product->fecha = $fecha;
            $product->save();
        }

        return redirect()->to('myIoTshop');
    }

    public function deleteProduct($id){
        // Si alguien ha realizado una compra de ese producto no dejaremos borrarlo.
        $orderDetail = OrderDetail::where('id_product', $id)->get();
        if($orderDetail != '[]'){
            return "<h3>No se puede puede borrar el producto. Existen ordenes detalles con dicho producto.
                    Contacte con el administrador para obtener ayuda</h3>";
        }
        Product::where('id', $id)->delete();
        return redirect()->to('myIoTshop');
    }

    public function ajaxItems(){
        $order = Order::all();
        return count($order);
    }

    public function purchaseProduct($id){

        $productNombre = Product::where('id',$id)->value('nombre');
        $productPrecio = Product::where('id',$id)->value('precio');
        session(['productNombre' => $productNombre]);
        session(['productPrecio' => $productPrecio]);

        return redirect()->to('myIoTshop');

    }

    public function eliminarProduct(){

        if (isset($_GET['producto'])){
            $producto = $_GET['producto'];
            if(isset($_GET['Eliminar'])){
                session()->forget($producto);
            }
        }

        return redirect()->to('myIoTshop');
    }

    public function procesarCompra(){

        if (isset($_GET['producto'], $_GET['cantidad'])){
            $producto = $_GET['producto'];
            $cantidad = $_GET['cantidad'];
            if(session()->has($producto)){ //si ya existe... añadimos los que estaban
                $cantidadAntes = session($producto); //index
                $cantidadActual = $cantidadAntes + $cantidad;
                session([$producto=>$cantidadActual]);
            } else {
                session([$producto => $cantidad]);
            }
        }

        return redirect()->to("myIoTshop");

    }

    public function vaciarCarrito(){
        $productosAll = self::getProducts();
        foreach($productosAll as $producto){
            if(session()->has($producto->nombre)){
                session()->forget($producto->nombre);
            }
        }

        return redirect()->to("myIoTshop");
    }


    public function checkout(){

        if(isset($_GET['cantidadFinal'])){

            $cantidadFinal = $_GET['cantidadFinal'];
            session(['cantidadFinal'=>$cantidadFinal]);
            // Order
            $order = new Order();
            $order->id_user = session('user');
            $order->total = $cantidadFinal;
            $order->estado = "Stock pending";
            $order->save();
            session(['orderID'=>$order->id]);


            // Order Detail
            $productosAll = self::getProducts();
            foreach($productosAll as $producto){
                if(session()->has($producto->nombre)){
                    $orderDetail = new OrderDetail();
                    $orderDetail->id_orden = $order->id;
                    $orderDetail->id_product = $producto->id;
                    $orderDetail->cantidad = session($producto->nombre);
                    $orderDetail->save();

                    //Decrementamos el stock
                    $nuevoStock = $producto->stock - session($producto->nombre);
                    if($nuevoStock < 0){
                        return  "<h3>Un producto se ha quedado sin stock. Operación Cancelada.";
                    }
                    Product::where('id', $producto->id)->update(array('stock' => $nuevoStock));
                }
            }

            // Orden satisfecha
            Order::where('id', $order->id)->update(array('estado' => 'Pendiente de pago'));

            //Factura
            $factura = new Invoice();
            $factura->id_orden = $order->id;
            $factura->id_user = session('user');
            $factura->estado = "Pending";
            $factura->moneda = "Euros";
            $factura->total = $cantidadFinal;
            $factura->formaDePago = "PayPal";
            $factura->save();
            session(['invoiceID'=>$factura->id]);
        }

        return redirect()->to("/paypal/pay");
    }


}
