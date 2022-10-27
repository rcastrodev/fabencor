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
        <p><strong>Por tipo de caja estandart</strong></p>
        <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
        @isset($data['company'])
            <p><strong>Empresa:</strong> {{ $data['company'] }}</p>
        @endisset
        @isset($data['message'])
            <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
        @endisset
    </div>
    @isset($data['variableproduct'])
        <table style="boder:none;">
            <thead>
                <tr>
                    <th style="text-align: left;">Medidas</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['variableproduct'] as $vp)
                    <tr>
                        <td style="text-align: left;">{{ $vp['measures'] }}</td>
                        <td>{{ $vp['value'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @endisset

</body>
</html>