<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje Recibido</title>
</head>
<body>

    <h1> Te responderemos a la brevedad posible</h1>

    <p>
        Nombre : {{ $data->nombre  }} <br>
        Email : {{ $data->email   }}   <br>
        Mensaje : {{ $data->mensaje  }} <br>

    </p>
    
</body>
</html>