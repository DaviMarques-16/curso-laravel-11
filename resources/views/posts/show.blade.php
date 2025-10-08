@extends('posts.layouts.app')

@section('title', 'Detalhes')

@section('content')
    <main class="flex-grow">
    
      <div>
        <p class="p-10 bg-zinc-300 border border-green-400 rounded-lg ml-3 mr-3 mt-2">
          {{ $post->content }}</p>
      </div>

      <div class="mt-2 flex flex-col">
          <h2 class="ml-3 text-green-950 font-semibold">Adicionar comentário</h2>

          <form action="{{ route('comments.store', $post) }}" method="POST">

              @csrf
              <textarea name="content" rows="3"
              class="w-[60%] ml-3 rounded-md border-gray-700 mt-2
              focus:border-green-300 focus:ring focus:ring-green-300 text-gray-900 text-lg"
              placeholder="comente aqui" required>
              {{ old('content') }}
              </textarea>
              <br>
              <button type="submit"
              class="inline-block mt-1.5 ml-3 px-2 py-2  font-semibold bg-cyan-500 rounded-lg hover:bg-cyan-600 text-sm">
                  Fazer comentário
              </button>

          </form>

          @if(session('success'))
            <div class="ml-3 text-green-950 font-semibold">
                <p>{{ session('success') }}</p>
            </div>
          @endif
      </div>

      <div class="m-3">
          <h2 class="text-2xl text-center text-green-950 font-bold">Comentários</h2>

          @if($post->comments->isEmpty())
            <p class="text-center">Não há comentários disponíveis</p>
          @else
              <div class="space-y-4">
                  @foreach($post->comments as $comment)
                      <div class="">
                          <p> Autor: {{ $comment->user->name }} </p>
                          <p>  {{ $comment->content }} </p>
                      </div>
                  @endforeach
              </div>
          @endif


      </div>

    </main>
@endsection