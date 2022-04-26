<!DOCTYPE html>
<html lang = 'es'>
    <head>
        <meta charset='utf-8'/>
        <title>Inicio</title>
        <link rel="stylesheet" href="..\resources\css\app.css" />
    </head>
    <body>
        @include('includes.header')
        @if(!isset($_SESSION['categoria']) || $_SESSION['categoria'] == 'Inicio')
            @include('includes.content_inicio')
        @else
            @include('includes.content_categoria')
        @endif
        @include('includes.footer')
    </body>
</html>