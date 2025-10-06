@extends('posts.layouts.app')

@section('title', 'Detalhes')

@section('content')
    <main class="flex-grow">
    
      <div>
        <p class="p-10 bg-zinc-300 border border-green-400 rounded-lg ml-2 mr-2 mt-2">{{ $post->content }}</p>
      </div>

    </main>
@endsection