<div id='content'>
    <a href="{{url('opcion/Inicio')}}"><img id='title' src='../resources/Images/logo.png' alt='Inicio'/></a>
    @if (isset($_SESSION['usuario']))
        <p>Bienvenido/a usuario {{$_SESSION['usuario']}}</p>
        <p>Su rol és {{$_SESSION['rol']}}</p>
    @endif
    @php

        $random_productos = [];

        if (!isset($_SESSION['filtrados']) || $_SESSION['filtrados'] == False){
            if (isset($_SESSION['Allproductos']))
            {
                $count = count($_SESSION['Allproductos']);

                $random_num = rand(1, $count);

                for ($i = 0; $i < $count/2; $i++){
                    for ($n = 0; $n < $count; $n++){
                        if ($random_num == $n+1){
                            if (in_array($_SESSION['Allproductos'][$n], $random_productos)) {
                                $random_num = rand(1, $count); 
                            }else{
                                array_push($random_productos, $_SESSION['Allproductos'][$n]);                            
                            }
                        }
                    }

                    $random_num = rand(1, $count);
                }

                if (count($random_productos) == 0){
                    array_push($random_productos, $_SESSION['Allproductos'][$random_num]); 
                }
            }
        }else{
            for ($i = 0; $i < count ($_SESSION['filtrados']); $i++){
                array_push($random_productos, $_SESSION['filtrados'][$i]);
            }
        }

        for ($i = 0; $i < count ($random_productos); $i++){
            $img[$i] = $random_productos[$i]->ruta_img;
            $ruta[$i] = 'producto/'.$random_productos[$i]->nombre;
        }

    @endphp
    <form action="{{route('buscador')}}" method='POST'>
        @csrf
        <p><input type = 'text' name = 'buscador'/><input type = 'submit' value = 'Buscar'/></p>
    </form>
    <table>
        <caption>Algunos productos interesantes</caption>
        <tr>
        @for ($i = 0; $i < count($random_productos); $i++)
            <th class = 'linkProducto'><a href="{{$ruta[$i]}}"><img class ='caratula' src='{{$img[$i]}}'/><br/>
            {{$random_productos[$i]->nombre}}<br/>
            {{$random_productos[$i]->precio}} €</a></th>
        @endfor
        </tr>
    </table>
</div>