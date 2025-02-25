<x-layout meta-title="Create new post">
    <h1>Create new post</h1>
    <form action="{{route('posts.store')}}" method="POST" class="flex column">
        @csrf
        <input type="text" name="title" value="{{old('title')}}">
        @error('title')
            <small style="color:red">{{$message}}</small>
        @enderror
        <button type="submit">Crear</button>
    </form>
</x-layout>

