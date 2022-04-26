<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    private $nombre;

    public function productos(){
        return $this->belongsToMany(Producto::class);
    }

    public function getAllCategorias(){
        $categorias = DB::table("categorias")->get()->toArray();

        return $categorias;
    }

    public function añadirCategoria(){
        $comprobar_categoria = DB::table("categorias")->where('nombre', $this->nombre)->get()->toArray();
        if(count($comprobar_categoria)==0){
            return True;
        }else {
            return False;
        }
    }

    public function comprobarCategoria($id_producto){
        $categorias = DB::table('categoria_producto')
        ->where('producto_id', $id_producto)
        ->get()->toArray();

        for ($i = 0; $i < count($categorias); $i++) {
            $id_categoria = $categorias[$i]->categoria_id;
        }

        $categoria = DB::table('categorias')
        ->where('id', $id_categoria)
        ->get()->toArray();

        for ($i = 0; $i < count($categoria); $i++) {
            $nombre_categoria = $categoria[$i]->nombre;
        }

        return $nombre_categoria;
    }
}
