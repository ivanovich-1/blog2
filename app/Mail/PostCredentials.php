<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCredentials extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $post;
    public $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $post, $admin)
    {
        $this->user = $user;
        $this->post = $post;
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.post-credentials')
            ->subject('Se ha creado un nuevo post de ' . $this->user->name);
    }
}
