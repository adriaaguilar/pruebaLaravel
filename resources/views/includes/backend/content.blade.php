<div id='backend_content'>
        @if(!isset($_SESSION['productos']) || $_SESSION['productos'] == 'Inicio')
                <p>Bienvenido al backend</p>
        @else
                <p>Productos</p>
        @endif
</div>