<!DOCTYPE html>
<html lang = 'es'>
    <head>
        <meta charset='utf-8'/>
        <title>Crear cuenta</title>
    </head>
    <body>
        <h1>Crear cuenta</h1>
        <form action="{{route('comprobarRegistro')}}" method='POST'>
            @csrf
            <label for='nombre'>Nombre: </label>
            <input type='text' name='nombre' value= "{{old('nombre')}}"/>
            {!! $errors ->first('nombre', '<small>:message</small>')!!}
            <br/>
            <label for='correo'>Correo: </label>
            <input type='email' name='correo' value= "{{old('correo')}}"/>
            {!! $errors ->first('correo', '<small>:message</small>')!!}
            <br/>
            <label for='contraseña'>Contraseña: </label>
            <input type='password' name='contraseña' value= "{{old('contraseña')}}"/>
            {!! $errors ->first('contraseña', '<small>:message</small>')!!}
            <br/>
            <input type='submit' value='Registrarse'/>
        </form>
        <a href="{{url('')}}">Volver al inicio</a>
        Ya tienes cuenta? <a href="{{url('entrar')}}">Iniciar sesion</a>
    </body>
</html>