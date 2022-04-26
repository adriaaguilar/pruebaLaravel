<!DOCTYPE html>
<html lang = 'es'>
    <head>
        <meta charset='utf-8'/>
        <title>Entrar</title>
    </head>
    <body>
        <h1>Entrar</h1>
        <form action="{{route('comprobarLogin')}}" method='POST'>
            @csrf
            <label for='correo'>Correo: </label>
            <input type='email' name='correo' value= "{{old('correo')}}"/>
            {!! $errors ->first('correo', '<small>:message</small>')!!}
            <br/>
            <label for='contraseña'>Contraseña: </label>
            <input type='password' name='contraseña' value= "{{old('contraseña')}}"/>
            {!! $errors ->first('contraseña', '<small>:message</small>')!!}
            <br/>
            <input type='submit' value='Entrar'/>
        </form>
        <a href="{{url('')}}">Volver al inicio</a>
        No tienes cuenta? <a href="{{url('registrar')}}">Registrate</a>
    </body>
</html>