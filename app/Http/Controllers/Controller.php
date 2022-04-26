<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

session_start();

class Controller extends BaseController
{
    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function linkBackend(){
        return view('backend');
    }
    
    public function linkInicio(){
        if(!isset($_SESSION['Allproductos'])){
            return redirect('/opcion/Inicio');
        }else if (!isset($_SESSION['categorias'])){
            return redirect('getCategorias');
        }else{
            return view('inicio');
        }
    }

    public function linkProducto(){
        if(!isset($_SESSION['infoProducto'])){
            return redirect('');
        }else{
            return view('infoProducto');
        }
    }
    
    public function linkEntrar(){
        return view('entrar');
    }

    public function linkRegistrar(){
        return view('registrar');
    }

    public function linkCarrito(){
        return view('carrito');
    }

    public function salir(){
        session_destroy();
        return redirect('');
    }
}
