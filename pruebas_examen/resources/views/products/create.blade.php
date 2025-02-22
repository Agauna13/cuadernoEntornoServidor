@extends('layouts.layout')  <!-- Asume que tienes un layout base -->

@section('content')
    <h1>Crear Producto</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf  <!-- Protección contra CSRF -->
        <input type="text" name="name" placeholder="Nombre" required>
        <textarea name="description" placeholder="Descripción"></textarea>
        <input type="number" name="price" step="0.01" placeholder="Precio" required>
        <input type="number" name="stock" placeholder="Stock" required>

        <!-- Select para categorías -->
        <select name="category_id">
            <option value="">Sin categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Guardar</button>
    </form>
@endsection
