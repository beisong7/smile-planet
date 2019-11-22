<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailDemon extends Mailable
{
    use Queueable, SerializesModels;

    public $maildeamon;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($maildeamon)
    {
        $this->maildeamon = $maildeamon;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('view.name');
        return $this->from('noreply@smileplanetef.org')
            ->view('mail.body')
            ->text('mails.body_plain')
            ->with([
                'message' => 'some message',
            ])
//            ->with(
//                [
//                    'testVarOne' => '1',
//                    'testVarTwo' => '2',
//                ])
//            ->attach(public_path('/images').'/demo.jpg', [
//                'as' => 'demo.jpg',
//                'mime' => 'image/jpeg',
//            ])
            ;
    }
}
