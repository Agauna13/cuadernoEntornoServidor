@extends('layouts.layout')  <!-- Asume que tienes un layout base -->

@section('content')
    <h1>Lista de Productos</h1>
    <a href="{{ route('products.create') }}">Crear Producto</a>

    @foreach ($products as $product)
        <div style="border:1px solid #ccc; padding: 10px; margin:10px 0;">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p><strong>Precio:</strong> ${{ $product->price }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            <p><strong>Categoría:</strong> {{ $product->category ? $product->category->name : 'Sin categoría' }}</p>
            <a href="{{ route('products.show', $product->id) }}">Ver</a>
            <a href="{{ route('products.edit', $product->id) }}">Editar</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </div>
    @endforeach
@endsection
