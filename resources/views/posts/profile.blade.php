@extends('posts.layouts.app')

@section('title', 'MeusPosts')

@section('content')
<main class="flex-grow">
    <div>

    @if($posts->isEmpty())
        <p class="text-sm py-1 px-2">Você ainda não criou nenhum post!</p>
    @else
        <div class="mt-4">
            @foreach($posts as $post)
                <div 
                class="p-4 ml-4 mt-2 bg-slate-500 border rounded-lg ">
                    <div>
                    <p class="font-bold"> {{$post->user->name}} </p>
                    </div>
                    <p>{{ Str::limit($post->content, 150) }}</p>
                </div>

                <div class="flex mt-1 items-center gap-3">
                    <a href="{{ route('posts.show', $post) }}"
                    class="px-2 ml-4 bg-slate-400 border rounded-lg hover:underline">
                    Detalhes
                    </a>

                    @auth
                        @if(auth()->id() === $post->user_id)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                class="px-2 ml-4 bg-red-400 border rounded-lg hover:underline">
                                    Apagar
                                </button>
                            </form>
                        @endif
                    @endauth

                </div>

                
            @endforeach
        </div>
    @endif
    </div>
</main>

@endsection
