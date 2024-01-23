<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendBasicEmail($recipient)
    {
        $data = ['name' => 'Virat Gandhi'];

        Mail::send('emails.basic', $data, function ($message) use ($recipient) {
            $message->to($recipient, 'Tutorials Point')
                ->subject('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com', 'Virat Gandhi');
        });

        return 'Basic Email Sent. Check your inbox.';
    }
}
