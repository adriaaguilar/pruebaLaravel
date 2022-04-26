<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_admin = Rol::where('nombre', 'admin')->first();
        $rol_client = Rol::where('nombre', 'cliente')->first();

        //////////////////////////////////////////////////////
           
        $user_client = new User();        
        $user_client->nombre = 'paco';        
        $user_client->correo = 'paco@mondongo.com';
        $user_client->contraseña = 'paco';
        $user_client->save();
        $user_client->rols()->attach($rol_client);

        ///////////////////////////////////////////////////////

        $user_admin = new User();        
        $user_admin->nombre = 'adri';        
        $user_admin->correo = 'adri@mondongo.com';
        $user_admin->contraseña = 'adri';
        $user_admin->save();
        $user_admin->rols()->attach($rol_admin);
    }
}
