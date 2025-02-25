<x-layout meta-title="Blog">
    <h1>blog</h1>
    @auth
    <a href="{{route('posts.create')}}">Crear Nuevo Post</a>
    @endauth
    <p>
        @if (session('status'))
            {{session('status')}}
        @endif
    </p>

    <ol>
        @foreach($posts as $post)
            @if($post)
                <li class="flex">
                    <a href="/blog/{{$post->id}}">
                        {{$post->title}}
                    </a>
                    @auth
                    <a href="{{route('posts.edit', $post)}}">Edit Post</a>
                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    @endauth
                </li>
            @endif
        @endforeach
    </ol>
    <x-slot name="sidebar">
        Blog Sidebar
    </x-slot>
</x-layout>
