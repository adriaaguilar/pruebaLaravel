<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria_primera = new Categoria();        
        $categoria_primera->nombre = 'Nuevo';       
        $categoria_primera->save();

        //////////////////////////////////////////////////////
           
        $categoria_segunda = new Categoria();        
        $categoria_segunda->nombre = 'Usado';       
        $categoria_segunda->save();

        //////////////////////////////////////////////////////

        $categoria_retro = new Categoria();        
        $categoria_retro->nombre = 'Retro';       
        $categoria_retro->save();

        //////////////////////////////////////////////////////
           
        $categoria_modding = new Categoria();        
        $categoria_modding->nombre = 'Modding';       
        $categoria_modding->save();
    }
}
