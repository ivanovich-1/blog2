<?php

namespace App\Http\Controllers;

use App\Events\PostLik;
use App\Events\PostVisit;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post, User $user)
    {
        if ($post->isPublished() || auth()->check()) {
            PostVisit::dispatch($post);
            return view('posts.show', compact('post', 'user'));
        }
        abort(404);
    }
}
