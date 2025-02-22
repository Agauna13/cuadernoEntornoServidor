
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
@foreach ($productos as $producto)
    <x-producto-card
        :nombre="$producto['nombre']"
        :precio="$producto['precio']"
        :descripcion="$producto['descripcion']"
    />
@endforeach
</body>
</html>
