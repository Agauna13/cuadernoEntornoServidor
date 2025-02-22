@extends('layouts.layout')  <!-- Asume que tienes un layout base -->


@section('content')
    <h1>Editar Producto</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Método HTTP PUT para actualizar -->
        <input type="text" name="name" value="{{ $product->name }}" placeholder="Nombre" required>
        <textarea name="description" placeholder="Descripción">{{ $product->description }}</textarea>
        <input type="number" name="price" value="{{ $product->price }}" step="0.01" placeholder="Precio" required>
        <input type="number" name="stock" value="{{ $product->stock }}" placeholder="Stock" required>

        <!-- Select para categorías -->
        <select name="category_id">
            <option value="">Sin categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Actualizar</button>
    </form>
@endsection
