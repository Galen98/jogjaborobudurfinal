<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\travel;
use App\Models\reviews;

class EmailConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $travel;
    public $reviews;

    public function __construct(travel $travel, reviews $reviews)
    {
        $this->travel = $travel;
        $this->reviews = $reviews;
    }

    public function build()
    {
        return $this->view('frontend.emailconfirmation')
        ->subject('Thank you! You have submitted your review.');
    }

}
