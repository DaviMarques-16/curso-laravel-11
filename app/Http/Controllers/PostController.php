<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    //Listar posts do usuário logado
    {
        $posts = Post::where('user_id', auth()->id())->latest()->get();

        return view('posts.index', compact('posts'));
       
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
        // só o dono acessa o show
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Ação não autorizada!');
        }

        $post->load('comments.user');

        return view('posts.show', compact('post'));
        

    }

    
    public function edit(Post $post)
    {
        //
    }

    
    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
