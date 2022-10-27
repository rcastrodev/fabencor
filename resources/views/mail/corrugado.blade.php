<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web</h2>
    <div>
        <p><strong>Tipo:</strong> Corrugado</p>
        <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
        @isset($data['company'])
            <p><strong>Empresa:</strong> {{ $data['company'] }}</p>
        @endisset
        @isset($data['medidas'])
            <p><strong>Medidas:</strong> {{ $data['medidas'] }}</p>
        @endisset
        @isset($data['cantidad'])
            <p><strong>Cantidad de rollos:</strong> {{ $data['cantidad'] }}</p>
        @endisset
        @isset($data['metros'])
            <p><strong>Metros:</strong> {{ $data['metros'] }}</p>
        @endisset
        @isset($data['message'])
            <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
        @endisset
    </div>
</body>
</html>