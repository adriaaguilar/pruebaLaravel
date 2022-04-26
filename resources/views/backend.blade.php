<!DOCTYPE html>
<html lang = 'es'>
    <head>
        <meta charset='utf-8'/>
        <title>Backend</title>
        <link rel="stylesheet" href="css/app.css" />
    </head>
    <body id='body_backend'>
        <h1 id='backend_title'>Back End</h1>
        <div id='backend_header'>
            <div class='opcion'><a href="{{url('backend')}}">Inicio</a></div>
            <div class='opcion'><a href="{{url('backend/productos')}}">Productos</a></div>        </div>
        @include('includes.backend.content')
        <div id='backend_footer'>
        </div>
    </body>
</html>