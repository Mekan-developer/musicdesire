<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $newOrder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newOrder)
    {
        $this->newOrder = $newOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $newMail = $this->view('mails.order')
            ->subject('Music Desire Order #' . $this->newOrder->id);
        foreach ($this->newOrder->tracks as $oTrack) {
            $trck = $oTrack->trackObj;
            if ($trck->full == null) {
                continue;
            }
            $pathToFile = storage_path('app/public/tracks/' . $trck->full);
            $mime = File::mimeType($pathToFile);
            $trAs = $trck->name_en ?? $trck->name_ru ?? 'track' . $trck->id;
            $parts = explode('.', $trck->full);
            $last_part = end($parts);
            $trAs = $trAs . '.' . $last_part;
            $newMail->attach($pathToFile, [
                'as' => $trAs,
                'mime' => $mime,
                // 'mime' => 'audio/mpeg',
            ]);
        }
        return $newMail;
    }
}
