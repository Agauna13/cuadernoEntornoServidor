<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
</head>
<body>
<h1>Lista de Productos</h1>

<h2>Añadir Nuevo Producto</h2>
<form method="POST" action="{{ route('productos.store') }}">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
    </div>
    <button type="submit">Agregar Producto</button>
</form>

<ul>
    @foreach ($productos as $key => $producto)
        <li>
            <a href="{{ route('productos.show', $key) }}">{{ $producto['nombre'] }}</a>
        </li>
    @endforeach
</ul>
</body>
</html>
