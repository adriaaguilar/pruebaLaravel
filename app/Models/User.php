<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    private $nombre;
    private $correo;
    private $contraseña;

    public function rols(){
        return $this->belongsToMany(Rol::class);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    public function getID(){
        $usuario = DB::table('users')
        ->where('nombre', $this->nombre)
        ->get()->toArray();

        for ($i = 0; $i < count($usuario); $i++) {
            $id_usuario = $usuario[$i]->id;
        }

        return $id_usuario;
    }

    public function getUserNombre(){
        $usuario = DB::table('users')
        ->where('correo', $this->correo)
        ->get()->toArray();

        for ($i = 0; $i < count($usuario); $i++){
            $nombre_usuario = $usuario[$i]->nombre;
        }

        return $nombre_usuario;
    }

    public function registro() {
        $comprobar_usuario = DB::select("select * from users where nombre = '$this->nombre' or correo = '$this->correo'");

        if(count($comprobar_usuario)==0){
            return True;
        }else {
            return False;
        }
    }

    public function login() {
        $comprobar_usuario = DB::table("users")->where('correo', $this->correo)->where('contraseña', $this->contraseña)->get()->toArray();

        if(count($comprobar_usuario)==0){
            return False;
        }else {
            return True;
        }
    }
}
