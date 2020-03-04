<?php

namespace App\Listeners;

use App\Events\PostWasCreated;
use App\Mail\PostCredentials;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendPostDone
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
     * @param  PostWasCreated  $event
     * @return void
     */
    public function handle(PostWasCreated $event)
    {
        foreach ($event->admin as $admin){
            Mail::to($admin)->queue(
                new PostCredentials($event->user, $event->post, $admin)
            );
        }
    }
}
