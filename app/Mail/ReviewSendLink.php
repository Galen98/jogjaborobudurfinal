<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\reviews;

class ReviewSendLink extends Mailable
{
    use Queueable, SerializesModels;

    public $reviews;

    public function __construct(reviews $reviews)
    {
        $this->reviews = $reviews;
    }

    public function build()
    {
        return $this->view('frontend.reviewsendlinkmail');
    }
}







