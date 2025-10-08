@extends('posts.layouts.app')

@section('title', 'Posts do Usuário')

@section('content')
    <main class="flex-grow">
        <div class="container">


            <h1 class="text-2xl py-5 px-5 text-center">Todos os Posts</h1>

            <div class="flex justify-evenly">
                <a href="{{ route('posts.create') }}" 
                class="inline-block py-2 px-4 ml-4 bg-cyan-500 text-black rounded-lg hover:bg-cyan-600 transition">
                    Criar novo Post
                </a>

                <a href="{{ route('posts.profile') }}"
                class="inline-block py-2 px-4 ml-4 bg-cyan-500 text-black rounded-lg hover:bg-cyan-600 transition">
                    Meu Perfil
                </a>
            </div>
            
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

                       <div class="flex mt-2 ml-2 mr-2 items-center gap- justify-evenly">
                            <a href="{{ route('posts.show', $post) }}"
                            class="px-2 ml-4 bg-slate-400 border rounded-lg hover:underline">
                            Detalhes
                            </a>

                            @auth
                                @if(auth()->id() === $post->user_id)
                                    <a href="{{ route('posts.edit', $post) }}"
                                    class="px-2 ml-4 bg-slate-400 border rounded-lg hover:underline">
                                        Editar
                                    </a>
                                @endif

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
