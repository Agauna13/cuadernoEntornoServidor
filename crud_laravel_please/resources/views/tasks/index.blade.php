@extends('components.layout')

@section('content')
    <h2>Listado de tareas</h2>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{route('tasks.create')}}">Crear Nueva Tarea</a>

    @if($tasks->isEmpty())
        <p>No hay tareas asignadas</p>
    @else
        <ul>
            @foreach($tasks as $task)
                <li>
                    <strong>{{$task->title}}</strong>
                    <p>{{$task->description}}</p>
                    <a href="{{route('tasks.show', $task->id)}}">Ver</a>
                    <a href="{{route('tasks.edit', $task->id)}}">Editar</a>
                    <form action="{{route('tasks.destroy', $task->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection


