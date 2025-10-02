<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
/

class CommentsController extends Controller
{
    /*
    Somente users logados terão
    acesso as actions do CommentsController
    */

    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request, $postId) {

        //observa se post é valido
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ])
        
        //post que vai receber o comentário
        $post = Post::findOrFail($postId);

        //Criação como registro na tabela comments
        $comment = $post->comments()->create([
            'content' => $validated['content'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Comentário inserido.');

    }

}
