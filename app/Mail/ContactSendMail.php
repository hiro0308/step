<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSendMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $email;
    public $name;
    public $subject;
    public $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->email = $inputs['email'];
        $this->name = $inputs['name'];
        $this->subject = $inputs['subject'];
        $this->comment = $inputs['comment'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contact.mail')
                    ->subject('自動送信メール | 株式会社step')
                    ->from('programming0033@gmail.com')
                    ->with([
                      'email' => $this->email,
                      'name' => $this->name,
                      'subject' => $this->subject,
                      'comment' => $this->comment,
                    ]);
    }
}
