<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'name_user' => 'required',
            'comment' => 'required'
        ]);

        $post->comments()->create([
            'comment' => $request->comment,
            'name_user' => $request->name_user
        ]);

        return redirect()->route('posts.show', $post->slug)->withFlash('Comentario creado con exito');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('flash', 'Foto eliminada');
    }
}
