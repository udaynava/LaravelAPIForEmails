<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Log;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $emailContent;
    public $attachmentsFilePath = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailContent)
    {
        $this->emailContent = $emailContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('email')->subject($this->emailContent['subject']);

        if (! isset($this->emailContent['attachments'])) {
            return $this->view('email')
                ->subject($this->emailContent['subject']);
        }

        foreach($this->emailContent['attachments'] as $key => $base64code) {
            # Create image file from base64 encoding
            $fp = fopen( public_path("img/" . $key), "w+");
            $op = fwrite($fp, base64_decode($base64code));

            # Store the attachment's filepath in the array
            if ($op) {
                $attachmentsFilePath[] = public_path("img/" . $key);
            }
        }

        foreach ((array) $attachmentsFilePath as $filePath) {
            $email->attach($filePath);
        }
        return $email;
    }
}
