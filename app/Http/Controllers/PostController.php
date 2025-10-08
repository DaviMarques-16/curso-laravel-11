<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    //Listar posts
    {
        $posts = Post::with('user')->latest()->get();

        return view('posts.index', compact('posts'));
       
    }

    //Listar posts do usuário logado
    public function profile() {
        $posts = Post::where('user_id', auth()->id())->latest()->get();

        return view('posts.profile', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        //criação no banco
        Post::create([
            'content' => $validated['content'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.index')
        ->with('success', 'Post criado com sucesso!');
    }

    
    public function show(Post $post)
    {

        $post->load('comments.user');

        return view('posts.show', compact('post'));
        

    }

    
    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Ação não autorizada!');
        }

        return view('posts.edit', compact('post'));
    }

    
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Ação não autorizada');
        }

        //valida os dados recebidos da requisição
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        
        $post->update([
            'content' => $validated['content'],
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post atualizado com sucesso!');

    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Ação não autorizada!');
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post removido!');
    }
}
