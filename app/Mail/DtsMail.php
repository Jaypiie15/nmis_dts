<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DtsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $url;
    public function __construct($url)
    {
        //
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.dts')->subject('NMIS Document Tracking System Notification for the Document '.request()->document_title)
        ->with([
            'url'=> $this->url])
            ->attach($this->url, [
                'as' => 'dts.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
