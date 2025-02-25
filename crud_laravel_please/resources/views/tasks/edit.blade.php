@extends('components.layout')

@section('content')
    <h2>Editar Tarea</h2>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('tasks.update', $task->id)}}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="title" id="title" value="{{old('title', $task->title)}}" required>

        <textarea name="description" id="description">{{old('description', $task->description)}}</textarea>

        <button type="submit">Actualizar</button>
    </form>

@endsection
