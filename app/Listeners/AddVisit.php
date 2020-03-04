<?php

namespace App\Listeners;

use App\Events\PostVisit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class AddVisit
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostVisit  $event
     * @return void
     */
    public function handle(PostVisit $event)
    {
        DB::table('posts')
            ->where('id', $event->post->id)
        ->increment('visits', 1);
    }
}
