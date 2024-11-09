<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = 'Test Mail';
        $from = new Address('test@mail.dev', 'Test Mail');
        return new Envelope(
            $subject,
            $from
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = 'test-mail';
        return new Content(
            $view
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
      public function build()
    {
        return $this->subject('Test Mail')
                    ->view('test-mail');
    }
}