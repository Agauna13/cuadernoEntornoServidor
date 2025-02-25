@extends('components.layout')

@section('content')
    <h2>Crear Nueva Tarea</h2>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <input type="text" name="title" id="title" value="{{old('title')}}" placeholder="Ingrese una tarea nueva"
               required>
        <textarea name="description" id="description">{{old('description')}}</textarea>
        <button type="submit">Guardar</button>
    </form>
@endsection
