@extends('posts.layouts.app')

@section('title', 'Criar Post')

@section('content')

    <main class="flex-grow">
        <h1>Criação de novo post</h1>
        <h2>Digite o que tem em mente</h2>

<form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
    @csrf
    
    {{-- Conteúdo postado --}}
        <div class="flex flex-col mt-4">

            <label for="content "
            class="text-gray-700 text-sm font-medium ml-4">
            Seja gentil
            </label>

            <textarea name="content" id="content" rows="5" 
            class="rounded-md ml-4 mr-4 border-gray-700 shadow-sm focus:border-green-300
            focus:ring focus:ring-green-300 mt-1 text-gray-900 text-lg font-medium"
            required>{{ old('content') }}
            </textarea>

        </div>

        <div class="flex gap-3">
            
            <button type="submit"
            class="inline-block px-4 py-2 rounded-lg bg-cyan-500 hover:bg-cyan-600 transition ml-3">
                Publicar!
            </button>

            <a href="{{ route('posts.index') }}"
            class="inline-block px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 transition">
                Cancelar
            </a>
            
        </div>
</form>
    </main>
@endsection