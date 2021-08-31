<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminPasswordResetEmail extends Mailable 
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mails.password_reset')
        ->from('admin@yetecan.com', 'Yetecan.com')
        ->subject('Changement de mot de passe')
        ->with([
            'message' => $this,
            'data' => $this->data,
            ]);
    }
}
