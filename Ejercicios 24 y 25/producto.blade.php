<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
</head>
<body>
<h1>{{ $producto['nombre'] }}</h1>
<p><strong>Precio:</strong> ${{ $producto['precio'] }}</p>
<p><strong>Descripción:</strong> {{ $producto['descripcion'] }}</p>
<a href="{{ route('productos.index') }}">Volver a la lista</a>
</body>
</html>
