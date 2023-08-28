<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\booking;
use App\Models\reviews;

class ReviewLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $reviews;

    public function __construct(booking $booking, reviews $reviews)
    {
        $this->booking = $booking;
        $this->reviews = $reviews;
    }

    public function build()
    {
        return $this->view('frontend.reviewmail');
    }
}







