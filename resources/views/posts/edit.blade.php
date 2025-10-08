@extends('posts.layouts.app')

@section('title', 'EditarPosts')

@section('content')
    <main class="flex-grow mt-2">
        <h1 class="text-green-900 font-bold text-center text-2xl">Editar Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST"
        class="mt-2">
            @csrf
            @method('PUT')

            
            <div class="flex">
                <textarea name="content" id="content" rows="5"
                class="w-[90%] rounded-md ml-6 mr-4 border-gray-700 shadow-sm focus:border-green-300
                focus:ring focus:ring-green-300 mt-1 text-gray-900 text-lg font-medium"
                required>{{ old('content', $post->content) }}
                </textarea>
            </div>

            <div class="flex gap-2 mt-2 ml-1.5">
                <a href="{{ route('posts.index') }}"
                class="px-2 py-2 ml-4 bg-red-400 border rounded-lg hover:underline">
                    Cancelar
                </a>

                <button type="submit"
                class="px-2 py-2 ml-4 bg-green-400 border rounded-lg hover:underline">
                    Salvar alterações
                </button>

            </div>
        </form>
    </main>
@endsection

