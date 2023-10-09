<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\booking;
use App\Models\reviews;
use App\Mail\ReviewLinkMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AutoSendReviewLinks extends Command
{
    protected $signature = 'auto-send-review-links';
    protected $description = 'send link otomatis';
    public function handle()
    {
        $bookingWaktu = booking::pluck('time');
        $bookingTanggal = booking::pluck('traveldate');
        $timenow="2023-10-07 16:51";
        $bookingData = booking::select('traveldate', 'time', 'id')->get();
        $list=[];
  
        
        foreach ($bookingData as $booking) {
            $cobahari = Carbon::createFromFormat('d/m/Y', $booking->traveldate)->format('Y-m-d');
            $cobawaktu = Carbon::parse($booking->time)->format('H:i');
            $combinedDateTime = $cobahari . ' ' . $cobawaktu;
            $cobasemuawaktu[] = $combinedDateTime;

            if ($combinedDateTime == $timenow) {
                $list[] = $booking->id;
            }
        }

        
        foreach($list as $listmail){
            $booking = booking::findOrFail($listmail);
            $email = $booking->email;
            $token = Str::random(40); 
            $data = [
                'booking_id'=>$listmail,
                'token'=>$token
            ];
            $review=reviews::create($data);
            Mail::to($email)->send(new ReviewLinkMail($booking, $review));
            $datatest[]=$listmail;

        }
        $this->info('Auto-send review links completed.');
    }
}
