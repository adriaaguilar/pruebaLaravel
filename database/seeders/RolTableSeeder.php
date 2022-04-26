<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_admin = new Rol();        
        $rol_admin->nombre = 'admin';        
        $rol_admin->descripcion = 'Usuario Administrador';        
        $rol_admin->save();

        //////////////////////////////////////////////////////
           
        $rol_client = new Rol();        
        $rol_client->nombre = 'cliente';        
        $rol_client->descripcion = 'Usuario Cliente';        
        $rol_client->save();
    }
}
