<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\MOdels\Categoria;

use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function mostrarAllProductos() {

        $producto = new Producto();
        $productos = $producto->getProductos();

        return $productos;
    }

    public function getCategorias(){
        $categoria = new Categoria();

        $categorias = $categoria->getAllCategorias();

        $_SESSION['categorias'] = $categorias;

        return redirect('');
    }

    public function mostrarProductos($categoria) {

        $_SESSION['categoria'] = $categoria;

        if ($categoria == 'Inicio'){
            $_SESSION['productos'] = False;

            $productos = $this->mostrarAllProductos();
            $_SESSION['Allproductos'] = $productos;
        }else{
            $producto = new Producto();

            $productos = $producto->getProductos();
            
            $n = 0;
            for ($i = 0; $i < count($productos); $i++){
                $producto = new Producto();
    
                $producto->setNombre($productos[$i]->nombre);
    
                $id_producto = $producto->getID();
                $categoriaProducto = new Categoria();
                $nombre_categoriaProducto = $categoriaProducto->comprobarCategoria($id_producto);
            
                if ($nombre_categoriaProducto == $categoria){
                    $productosCategoria[$n] = $productos[$i];
                    $n++;
                }
            }
    
            if (!isset($productosCategoria)){
                $_SESSION['productos'] = False;
            }else{
                $_SESSION['productos'] = $productosCategoria;   
            }
        }
        
        $_SESSION['filtrados'] = False;
        
        return redirect('');
    }
}
