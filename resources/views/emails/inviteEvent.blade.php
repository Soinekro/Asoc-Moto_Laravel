<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactanos</title>
</head>
<body>
    <h1>Correo electronico</h1>
    Saludos Estimado Socio se le hace la invitacion al Siguiente Evento: <p>{{$correo['name_evento']}}</p><br>
    A realizarce el dia <strong>{{ date ("d/m/Y", strtotime ($correo['fecha_hora']) )}}</strong> a las <strong>{{ date ("H:i:s", strtotime ($correo['fecha_hora']) )}}</strong>
    con asunto de <p>{{$correo['descripcion_evento']}}</p> <br>
    en la siguiente Locacion
    <strong style="color: blue">{{$correo['direccion']}}</strong>
    <footer>
        Nos despedimos Deceandole que tenga un buen dia,
        si tiene inconvenientes, Puede presentar <a href="http://asoc-moto_proyect.test/admin/justificaciones/create">una justificacion</a>
    </footer>
</body>
</html>
