<!DOCTYPE html>
<html lang = 'es'>
    <head>
        <meta charset='utf-8'/>
        <title>Carrito</title>
        <link rel="stylesheet" href="..\resources\css\app.css" />
    </head>
    <body>
        @include('includes.header')
        @if(!isset($_SESSION['carrito']))
            <p>No se encuentrar productos agregados al carrito</p>
        @else
            <table>
                <tr>
                    <th>Nombre producto</th>
                    <th>Cantidad del producto</th>
                    <th>Precio total del producto</th>
                </tr>
                @php
                    $suma_total = 0;
                @endphp
                @for ($i = 0; $i < count($_SESSION['carrito']); $i++)
                    @php
                        $total_producto = $_SESSION['carrito'][$i][2]*$_SESSION['carrito'][$i][1];
                        $suma_total = $suma_total + $total_producto;
                    @endphp
                    <tr>
                        <th>{{$_SESSION['carrito'][$i][0]}}</th>
                        <th>{{$_SESSION['carrito'][$i][1]}}</th>
                        <th>{{$total_producto}} €</th>
                    </tr>
                @endfor
                <tr>
                    <th>Total del pedido</th>
                    <th></th>
                    <th>{{$suma_total}} €</th>
                </tr>
            </table>
            @if (isset($_SESSION['usuario']))
                <a href = "">Realizar pedido</a>
            @endif
        @endif
        @include('includes.footer')
    </body>
</html>