<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;

class UsuarioController extends Controller
{
    public function comprobarLogin(Request $request) {
        request()->validate([
            'correo'=>'required',
            'contraseña'=>'required'
        ]);

        $correo = $request->get('correo');
        $contraseña = $request->get('contraseña');

        $usuario = new User();

        $usuario->setCorreo($correo);
        $usuario->setContraseña($contraseña);
        
        if($usuario->login()==True){
            $nombre = $usuario->getUserNombre();
            $usuario->setNombre($nombre);
            $id_usuario = $usuario->getID();
            $rol = new Rol();
            $nombre_rol = $rol->comprobarRol($id_usuario);

            $_SESSION['usuario'] = $usuario->getNombre();
            $_SESSION['rol'] = $nombre_rol;

            if($_SESSION['rol'] == 'admin'){
                return redirect('backend');
            }else{
                return redirect('');
            }
        }else {
            return redirect('entrar');
        }
    }

    public function comprobarRegistro(Request $request) {
        request()->validate([
            'nombre'=>'required',
            'correo'=>'required',
            'contraseña'=>'required'
        ]);

        $nombre = $request->get('nombre');
        $correo = $request->get('correo');
        $contraseña = $request->get('contraseña');

        $rol_client = Rol::where('nombre', 'cliente')->first();

        $user_client = new User();

        $user_client->setNombre($nombre);
        $user_client->setCorreo($correo);
        $user_client->setContraseña($contraseña);
        
        if($user_client->registro()==True){
            $user_client->nombre = $user_client->getNombre();        
            $user_client->correo = $user_client->getCorreo();
            $user_client->contraseña = $user_client->getContraseña();
            $user_client->save();
            $user_client->rols()->attach($rol_client);
            $_SESSION['rol'] = $rol_client->nombre;
            $_SESSION['usuario'] = $user_client->getNombre();
            return redirect('');
        }else {
            return redirect('registrar');
        }
    }
}
