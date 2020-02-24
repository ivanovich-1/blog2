<?php

use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $posts->each(function ($p){
           $comments = factory(Comment::class, 5)->make();
           $p->comments()->saveMany($comments);
        });
    }
}
