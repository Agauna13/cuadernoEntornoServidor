<x-layout meta-title="{{$post->title}} ">
    <h1>{{$post->title}}</h1>
    <form action="{{route('posts.update', $post)}}" method="POST" class="flex column">
        @method('patch')
        @csrf
        <input type="text" name="title" value="{{old('title'), $post->title}}">
        @error('title')
        <small style="color:red">{{$message}}</small>
        @enderror
        <button type="submit">Crear</button>
    </form>
</x-layout>

