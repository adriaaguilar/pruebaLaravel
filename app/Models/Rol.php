<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    private $nombre;
    private $descripcion;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function comprobarRol($id_usuario){
        $rols = DB::table('rol_user')
        ->where('user_id', $id_usuario)
        ->get()->toArray();

        for ($i = 0; $i < count($rols); $i++) {
            $id_rol = $rols[$i]->rol_id;
        }
        
        $rol = DB::table('rols')
        ->where('id', $id_rol)
        ->get()->toArray();

        for ($i = 0; $i < count($rol); $i++) {
            $nombre_rol = $rol[$i]->nombre;
        }

        return $nombre_rol;
    }
}
