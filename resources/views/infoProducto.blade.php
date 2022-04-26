<!DOCTYPE html>
<html lang = 'es'>
    <head>
        <meta charset='utf-8'/>
        <title>{{$_SESSION['infoProducto'][0]->nombre}}</title>
        <link rel="stylesheet" href="..\resources\css\app.css" />
    </head>
    <body>
        @php

            $ruta = $_SESSION['infoProducto'][0]->ruta_img;

        @endphp
        @include('includes.header')
        <div id = 'productoContent'>
            <img id = 'imagenProducto' src = "{{$ruta}}" alt = 'Imagen_producto'>
            <table id = 'tablaProducto'>
                <tr>
                    <th id = 'nombreProducto'>{{$_SESSION['infoProducto'][0]->nombre}}</th>
                </tr>
                <tr>
                    <th id = 'precioProducto'>{{$_SESSION['infoProducto'][0]->precio}} €</th>
                </tr>
                <tr id = 'restaProducto'>
                    <th>Marca: {{$_SESSION['infoProducto'][0]->marca}}<br/>
                    Año de salida: {{$_SESSION['infoProducto'][0]->año}}<br/>
                    Cantidad disponible: {{$_SESSION['infoProducto'][0]->cantidad}}</th>
                </tr>
                <tr>
                    <form action = "{{'añadirCarrito/'.$_SESSION['infoProducto'][0]->nombre.'/'.$_SESSION['infoProducto'][0]->precio}}" method = "GET">
                    @csrf
                        <th>Cantidad: <input type = 'number' name = 'cantidad' min = '1' max = "{{$_SESSION['infoProducto'][0]->cantidad}}"/>
                        <input type = 'submit' value = 'Añadir al carrito'/></th>
                    </form>
                </tr>
            </table>
        </div>
        @include('includes.footer')
    </body>
</html>