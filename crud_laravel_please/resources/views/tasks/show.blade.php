@extends('components.layout')

@section('content')
    <h2>Detalles de la Tarea</h2>
    <h3>{{ $task->title }}</h3>
    <p>{{ $task->description }}</p>

    <a href="{{ route('tasks.index') }}">Volver al listado</a>
@endsection
