<div id='content'>
    <h1>{{$_SESSION['categoria']}}</h1>

    @if ($_SESSION['productos'] == False)
        <p>No hay productos ha mostrar</p>
    @else
        @php
            for ($i = 0; $i < count ($_SESSION['productos']); $i++){
                $img[$i] = $_SESSION['productos'][$i]->ruta_img;
                $ruta[$i] = 'producto/'.$_SESSION['productos'][$i]->nombre;
            } 
        @endphp
        <table>
            <tr>
                @for ($i = 0; $i < count ($_SESSION['productos']); $i++)
                    <th class = 'linkProducto'><a href="{{$ruta[$i]}}"><img class ='caratula' src='{{$img[$i]}}'/><br/>
                    {{$_SESSION['productos'][$i]->nombre}}<br/>
                    {{$_SESSION['productos'][$i]->precio}} €</a></th>    
                @endfor
            </tr>
        </table>
    @endif
</div>