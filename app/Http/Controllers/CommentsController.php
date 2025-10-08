<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
   

    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request, $postId) {

        //observa se post é valido
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        
        //post que vai receber o comentário
        $post = Post::findOrFail($postId);

        //Criação como registro na tabela comments
        $comment = $post->comments()->create([
            'content' => $validated['content'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Comentário inserido.');

    }

    public function destroy(Comment $comment) {
        
        //erro 403 se o comentário não for do usuário
        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Ação não autorizada');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comentário removido!');

    }

}
