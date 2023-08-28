<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\reviews;
use App\Mail\ReviewLinkMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Reviewemail extends Controller
{
    public function sendReviewLinks(Request $request, $idbookings)
    {
        $booking = booking::findOrFail($idbookings);
        $email = $booking->email;

       $token = Str::random(40); 
       $data = [
        'booking_id'=>$idbookings,
        'token'=>$token
       ];
       $review=reviews::create($data);

       Mail::to($email)->send(new ReviewLinkMail($booking, $review));
    
        return redirect()->back();
    }
}
