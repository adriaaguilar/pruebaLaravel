<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria_primera = Categoria::where('nombre', 'Nuevo')->first();
        $categoria_segunda = Categoria::where('nombre', 'Usado')->first();
        $categoria_retro = Categoria::where('nombre', 'Retro')->first();
        $categoria_modding = Categoria::where('nombre', 'Modding')->first();

        ///////////////////////////////////////////////////////

        $producto_retro = new Producto();        
        $producto_retro->nombre = 'playStation';        
        $producto_retro->ruta_img = '../resources/Images/PlayStation.png';
        $producto_retro->marca = 'Sony';
        $producto_retro->año = '1994';
        $producto_retro->cantidad = '20';
        $producto_retro->precio = '75';     
        $producto_retro->save();
        $producto_retro->categorias()->attach($categoria_retro);
        
        //////////////////////////////////////////////////////
           
        $producto_segunda = new Producto();        
        $producto_segunda->nombre = 'Wii';        
        $producto_segunda->ruta_img = '../resources/Images/Wii.png';
        $producto_segunda->marca = 'Nintendo';
        $producto_segunda->año = '2006';
        $producto_segunda->cantidad = '25';
        $producto_segunda->precio = '50';
        $producto_segunda->save();
        $producto_segunda->categorias()->attach($categoria_segunda);
        
        //////////////////////////////////////////////////////
           
        $producto_modding = new Producto();        
        $producto_modding->nombre = 'MasterXbox';        
        $producto_modding->ruta_img = '../resources/Images/MasterXbox.png';
        $producto_modding->marca = 'Microsoft';
        $producto_modding->año = '2015';
        $producto_modding->cantidad = '1';
        $producto_modding->precio = '220';
        $producto_modding->save();
        $producto_modding->categorias()->attach($categoria_modding);

        ///////////////////////////////////////////////////////

        $producto_primera = new Producto();        
        $producto_primera->nombre = 'Switch';        
        $producto_primera->ruta_img = '../resources/Images/Switch.png';
        $producto_primera->marca = 'Nintendo';
        $producto_primera->año = '2017';
        $producto_primera->cantidad = '100';
        $producto_primera->precio = '320';
        $producto_primera->save();
        $producto_primera->categorias()->attach($categoria_primera);
    }
}
