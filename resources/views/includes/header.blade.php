<div id='header'>
    <div class='opcion'><a href="{{url('opcion/Inicio')}}"><img id='inicio' src='../resources/Images/inicio.png' alt='Inicio'/></a></div>
    @php
        for ($i = 0; $i < count($_SESSION['categorias']); $i++){
            $nombre[$i] = $_SESSION['categorias'][$i]->nombre;
        }
    @endphp
    @for ($i = 0; $i < count($_SESSION['categorias']); $i++)
        <div class = 'opcion'><a href="{{url('opcion/'.$nombre[$i])}}">{{$nombre[$i]}}</a></div>
    @endfor
    @if(isset($_SESSION['usuario']))
        <div class='opcion'><a href="{{url('salir')}}">Cerrar sesion</a></div>
    @else
        <div class='opcion'><a href="{{url('entrar')}}">Iniciar sesion</a></div>
    @endif
    <div id = 'carrito'><a href = "{{url('carrito')}}"><img id ='carrito' src = '../resources/Images/carrito.png' alt = 'Carrito'></a></div>
</div>