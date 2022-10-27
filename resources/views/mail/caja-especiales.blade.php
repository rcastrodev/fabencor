<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web</h2>
    <div>
        <p><strong>Por tipo de caja especial</strong></p>
        <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
        @isset($data['company'])
            <p><strong>Empresa:</strong> {{ $data['company'] }}</p>
        @endisset
        <p><strong>Contenido:</strong> {{ $data['contenido'] }}</p>
        <p><strong>Peso apróximado del contenido:</strong> {{ $data['peso_aproximado_contenido'] }}</p>
        @if ($data['material_doble_triple'])
            <p><strong>Material doble - triple:</strong> {{ $data['material_doble_triple'] }}</p>
        @endif
        <p><strong>Largo:</strong> {{ $data['largo'] }}</p>
        <p><strong>Ancho:</strong> {{ $data['ancho'] }}</p>
        <p><strong>Alto:</strong> {{ $data['alto'] }}</p>
        @isset($data['cantidad'])
            <p><strong>Cantidad:</strong> {{ $data['cantidad'] }}</p>
        @endisset
        @isset($data['libraje'])
            <p><strong>Libraje:</strong> {{ $data['libraje'] }}</p>
        @endisset
        @isset($data['company'])
            <p><strong>Impresión:</strong> {{ $data['company'] }}</p>
        @endisset
        @isset($data['impresion'])
            <p><strong>Mensaje:</strong> {{ $data['impresion'] }}</p>
        @endisset
    </div>
</body>
</html>