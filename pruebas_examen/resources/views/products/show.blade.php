@extends('layouts.layout')  <!-- Asume que tienes un layout base -->

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{  $product->description  }}</p>
    <p><strong>Precio:</strong>{{  $product->price  }}</p>
    <p><strong>Stock:</strong>{{  $product->stock  }}</p>
    <p><strong>Categoría:</strong>{{ $product->category ? $product->category->name : 'sin categoría' }}</p>
    <a href="{{ route('products.index') }}">Volver a la Lista</a>
@endsection
