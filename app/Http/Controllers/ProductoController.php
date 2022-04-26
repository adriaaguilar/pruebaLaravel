<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function comprobarRegistro(Request $request) {
        request()->validate([
            'nombre'=>'required',
            'ruta_img'=>'required',
            'marca'=>'required',
            'año'=>'required',
            'cantidad'=>'required',
            'precio'=>'required',
            'categoria'=>'required'
        ]);

        $nombre = $request->get('nombre');
        $ruta_img = $request->get('ruta_img');
        $marca = $request->get('marca');
        $año = $request->get('año');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $categoria = $request->get('categoria');

        $categoria = Categoria::where('nombre', $categoria)->first();

        $producto = new Producto();

        $producto->setNombre($nombre);
        $producto->setRuta_img($ruta_img);
        $producto->setMarca($marca);
        $producto->setAño($año);
        $producto->setCantidad($cantidad);
        $producto->setPrecio($precio);
        
        if($producto->registro()==True){
            $producto->nombre = $producto->getNombre();        
            $producto->ruta_img = $producto->getRuta_img();
            $producto->marca = $producto->getMarca();
            $producto->año = $producto->getAño();        
            $producto->cantidad = $producto->getCantidad();
            $producto->precio = $producto->getPrecio();
            $producto->save();
            $producto->categorias()->attach($categoria);
        }

        return redirect('mostrarProductos');
    }

    public function mostrarProducto($nombre){
        $producto = new Producto();
        $producto->setNombre($nombre);
        $id_producto = $producto->getID();

        $info = $producto->getInfo($id_producto);

        $_SESSION['infoProducto'] = $info;

        return redirect('producto');
    }

    public function buscar(Request $request){
        $valor = $request->get('buscador');

        $productos_filtrados = [];

        $producto = new Producto();
        $productos = $producto->getProductos();
        
        $count = 0;
        for ($i = 0; $i < count ($productos); $i++){
            if (strtolower($valor) == strtolower($productos[$i]->nombre) || strtolower($valor) == strtolower($productos[$i]->marca)){
                array_push($productos_filtrados, $productos[$i]);
                $count++;
            }
        }
        
        if($count > 0){
            $_SESSION['filtrados'] = $productos_filtrados;
        }
        
        return redirect('');
    }

    public function añadirCarrito($nombre, $precio){
        if(!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = [];
        }

        $cantidad = $_GET['cantidad'];

        array_push($_SESSION['carrito'], [$nombre, $cantidad, $precio]);
        
        return redirect('');
    }
}
