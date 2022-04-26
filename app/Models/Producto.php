<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    private $nombre;
    private $ruta_img;
    private $marca;
    private $año;
    private $cantidad;
    private $precio;

    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getRuta_img() {
        return $this->ruta_img;
    }

    public function setRuta_img($ruta_img) {
        $this->ruta_img = $ruta_img;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getAño() {
        return $this->año;
    }

    public function setAño($año) {
        $this->año = $año;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getID(){
        $producto = DB::table('productos')
        ->where('nombre', $this->nombre)
        ->get()->toArray();

        for ($i = 0; $i < count($producto); $i++) {
            $id_producto = $producto[$i]->id;
        }

        return $id_producto;
    }

    public function getInfo($id){
        $info = DB::table('productos')
        ->where('id', $id)
        ->get()->toArray();

        return $info;
    }

    public function getProductos(){
        $productos = DB::table("productos")->get()->toArray();

        if (count($productos)==0){
            return False;
        }else{
            return $productos;
        }
    }

    public function registro() {
        $comprobar_producto = DB::table("productos")->where('nombre', $this->nombre)->get()->toArray();

        if(count($comprobar_usuario)==0){
            return True;
        }else {
            return False;
        }
    }
}
