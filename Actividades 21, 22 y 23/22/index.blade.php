
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
@foreach ($productos as $producto)
    <x-producto-card>
    <p>{{ $producto['nombre'] }}</p>
    <p>{{ $producto['precio'] }}</p>
    <p>{{ $producto['descripcion'] }}</p>
    </x-producto-card>
@endforeach
</body>
</html>
