<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationSend extends Mailable
{
    use Queueable, SerializesModels;

    public $name = null;

    public $contact = null;

    public $arrive = null;

    public $departure = null;

    public $location = null;

    public $comment = null;

    public $passport = '';

    public $passport_arrival = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $contact, $arrive, $departure, $location, $comment, $passport, $passport_arrival)
    {
        $this->name = $name;
        $this->contact = $contact;
        $this->arrive = $arrive;
        $this->departure = $departure;
        $this->location = $location;
        $this->comment = $comment;
        $this->passport = $passport;
        $this->passport_arrival = $passport_arrival;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), $this->name)
            ->subject('New Ukrainian Registration')
            ->view('mail.application');
    }
}
