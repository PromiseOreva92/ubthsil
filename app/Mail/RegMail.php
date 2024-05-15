<?php

namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$strval;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,$strval)
    {
        $this->user = $user;
        $this->strval = $strval;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Registration Successful',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.reg_mail',
            with: [
                'firstname' => $this->user->firstname,
                'lastname' => $this->user->lastname,
                'user' => $this->user->id,
                'code' => $this->strval,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
