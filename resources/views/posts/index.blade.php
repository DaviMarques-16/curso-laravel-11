@extends('posts.layouts.app')

@section('title', 'Posts do Usuário')

@section('content')
    <main class="flex-grow">
        <div class="container">


            <h1 class="text-2xl py-5 px-5 text-center"> Meus Posts  </h1>

            <a href="{{ route('posts.create') }}" 
            class="inline-block py-2 px-4 ml-4 bg-cyan-500 text-black rounded-lg hover:bg-cyan-600 transition">
                Criar novo Post
            </a>
            
            @if($posts->isEmpty())
                <p class="text-sm py-1 px-2">Você ainda não criou nenhum post!</p>
            @else
                <div class="mt-4">
                    @foreach($posts as $post)
                       <div 
                       class="p-4 ml-4 mt-2 bg-slate-500 border rounded-lg ">
                          <p>{{ Str::limit($post->content, 150) }}</p>
                       </div>

                       <div class="flex mt-1 items-center gap-3">
                            <a href="{{ route('posts.show', $post) }}"
                            class="px-2 ml-4 bg-slate-400 border rounded-lg hover:underline">
                            Detalhes
                            </a>


                       </div>

                       
                    @endforeach
                </div>
            @endif


        </div>
    </main>
@endsection
