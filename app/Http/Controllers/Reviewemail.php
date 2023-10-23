<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\booking;
use App\Models\reviews;
use App\Models\countrating;
use App\Models\region;
use App\Models\province;
use App\Models\destination;
use App\Models\season;
use App\Models\bahasa;
use App\Models\Rate;
use App\Models\travel;
use App\Mail\ReviewLinkMail;
use App\Mail\EmailConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class Reviewemail extends Controller
{
    public function sendReviewLinks(Request $request, $idbookings)
    {
        $booking = booking::findOrFail($idbookings);
        $searchtoken=reviews::where('booking_id', $idbookings)->first();
            if($searchtoken == null){
            $email = $booking->email;
            $wisataid= $booking->wisata_id;
            $token = Str::random(40); 
            while (reviews::where('token', $token)->exists()) {
                $token = Str::random(40);
            }
            $data = [
                'booking_id'=>$idbookings,
                'token'=>$token,
                'wisata_id'=>$wisataid
            ];
            $review=reviews::create($data);
            Mail::to($email)->send(new ReviewLinkMail($booking, $review));
        } else{
            $email = $booking->email;
            $review=reviews::where('booking_id', $idbookings)->first();
            Mail::to($email)->send(new ReviewLinkMail($booking, $review));
        }

        Alert::success('Berhasil');
        return redirect()->back();
    }

    public function autoSendReviewLinks(Request $request){
        $bookingWaktu = booking::pluck('time');
        $bookingTanggal = booking::pluck('traveldate');
        // $timenow= "2023-08-31 21:31";
        $timenow=Carbon::now()->format('Y-m-d H:i');
        $bookingData = booking::select('traveldate', 'time', 'id')->get();
        $list=[];
  
        
        foreach ($bookingData as $booking) {
            $hari = Carbon::createFromFormat('d/m/Y', $booking->traveldate)->format('Y-m-d');
            $waktu = Carbon::parse($booking->time)->format('H:i');
            $combinedDateTime = $hari . ' ' . $waktu;
            $cobasemuawaktu[] = $combinedDateTime;
            if ($combinedDateTime == $timenow) {
                $list[] = $booking->id;
            }
        }

        foreach($list as $listmail){
            // $datatest = booking::where('id', $listmail)->get();
            $booking = booking::findOrFail($listmail);
            $searchtoken=reviews::where('booking_id', $listmail)->first();
            if($searchtoken == null){
            $email = $booking->email;
            $wisataid= $booking->wisata_id;
            $token = Str::random(40); 
            while (reviews::where('token', $token)->exists()) {
                $token = Str::random(40);
            }
            $data = [
                'booking_id'=>$listmail,
                'token'=>$token,
                'wisata_id'=>$wisataid
            ];
            $review=reviews::create($data);
            Mail::to($email)->send(new ReviewLinkMail($booking, $review));
            $datatest[]=$listmail;
        } else{
            $email = $booking->email;
            $review=reviews::where('booking_id', $listmail)->first();
            Mail::to($email)->send(new ReviewLinkMail($booking, $review));
        }
        }

        return response()->json([$cobasemuawaktu, $timenow]);
    }

    public function reviewpage(Request $request, $token){
    $datareview = reviews::where('token', $token)->first();
    if($datareview == null){
        $bahasa=bahasa::get();
        $lang=$request->server('HTTP_ACCEPT_LANGUAGE');
        $langs=Str::substr($lang, 0,2);
    if ($langs == 'id') {
        $sessions = session()->get("bahasa") ?? "Bahasa";
        
    }elseif ($langs == 'en-US'){
        $sessions = session()->get("bahasa") ?? "English";
        
    }elseif ($langs == 'en'){
        $sessions = session()->get("bahasa") ?? "English";
    }
    elseif ($langs == 'ms'){
        $sessions = session()->get("bahasa") ?? "Malay";
    }
    else{
        $sessions = session()->get("bahasa") ?? "English";     
    }
            $city=region::get();
            $province=province::get();
            $season = season::get();
            $destination=destination::get();
            $rateIDR = Rate::where("currency", "IDR")->first()->rate;
            $rateSGD = Rate::where("currency", "SGD")->first()->rate;
            $rateMYR = Rate::where("currency", "MYR")->first()->rate;
            $rateEUR = Rate::where("currency", "EUR")->first()->rate;
            // get session user
            $session = session()->get("rate") ?? "USD";
            return view('errors.reviewsubmit', compact('bahasa','session','sessions','province','city','season','destination'));

    }else{
    $idbooking = $datareview->booking_id;
    $idwisata = $datareview->wisata_id;
    $databooking = booking::where('id', $idbooking)->first();
    $datawisata = travel::where('wisata_id', $idwisata)->first();
    return view('frontend.reviewpage', compact('databooking','datawisata', 'datareview'));
    }
    }


    public function insertReview(Request $request){
        $reviewid = $request->reviewid;
        $travelid = $request->travelid;
        $img= $request->file('images');
        if($img !== null){
        $image = Image::make($img->getRealPath());
        $image->resize(750, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file = time() . "_" . $img->getClientOriginalName();
        $tujuan_upload = 'public/img/review/';
        $image->encode('webp', 10)->save(($tujuan_upload . '/' . pathinfo($nama_file, PATHINFO_FILENAME) . '.webp'));
        $nama_files = pathinfo($nama_file, PATHINFO_FILENAME) . '.webp';
    } else{
        $nama_files = null;
    }
    
        $img2= $request->file('images2');
        if($img2 !== null){
        $image2 = Image::make($img2->getRealPath());
        $image2->resize(750, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file2 = time() . "_" . $img2->getClientOriginalName();
        $tujuan_upload2 = 'public/img/review/';
        $image2->encode('webp', 80)->save(($tujuan_upload2 . '/' . pathinfo($nama_file2, PATHINFO_FILENAME) . '.webp'));
        $nama_files2 = pathinfo($nama_file2, PATHINFO_FILENAME) . '.webp';
    } else{
        $nama_files2 = null;
    }

        $img3= $request->file('images3');
        if($img3 !== null){
        $image3 = Image::make($img3->getRealPath());
        $image3->resize(750, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file3 = time() . "_" . $img3->getClientOriginalName();
        $tujuan_upload3 = 'public/img/review/';
        $image3->encode('webp', 80)->save(($tujuan_upload3 . '/' . pathinfo($nama_file3, PATHINFO_FILENAME) . '.webp'));
        $nama_files3 = pathinfo($nama_file3, PATHINFO_FILENAME) . '.webp';
    } else{
        $nama_files3 = null;
    }
        $img4= $request->file('images4');
        if($img4 !== null){
        $image4 = Image::make($img4->getRealPath());
        $image4->resize(750, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file4 = time() . "_" . $img4->getClientOriginalName();
        $tujuan_upload4 = 'public/img/review/';
        $image4->encode('webp', 80)->save(($tujuan_upload4 . '/' . pathinfo($nama_file4, PATHINFO_FILENAME) . '.webp'));
        $nama_files4 = pathinfo($nama_file4, PATHINFO_FILENAME) . '.webp';
    } else{
        $nama_files4 = null;
    }
        $img5= $request->file('images5');
        if($img5 !== null){
        $image5 = Image::make($img5->getRealPath());
        $image5->resize(750, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file5 = time() . "_" . $img5->getClientOriginalName();
        $tujuan_upload5 = 'public/img/review/';
        $image5->encode('webp', 80)->save(($tujuan_upload5 . '/' . pathinfo($nama_file5, PATHINFO_FILENAME) . '.webp'));
        $nama_files5 = pathinfo($nama_file5, PATHINFO_FILENAME) . '.webp';
        } else{
            $nama_files5 = null;
        }
        
        reviews::where('id', $reviewid)->update([
                    'star_rating' => $request->rating,
                    'name' => $request->name,
                    'traveldate' => $request->traveldate,
                    'paketwisata' => $request->paketwisata,
                    'comments' => $request->comment,
                    'country' => $request->country,
                    'token' => null,
                    'image' => $nama_files,
                    'image2' => $nama_files2,
                    'image3' => $nama_files3,
                    'image4' => $nama_files4,
                    'image5' => $nama_files5,
                ]);

        $rating = reviews::where('wisata_id', $travelid)
        ->where('token', null)
        ->avg('star_rating');
        $getwisataRating = countrating::where('wisata_id', $travelid)
        ->first();

        if($getwisataRating == null){
            $data = [
                'wisata_id' => $travelid,
                'totalrating' => $rating
            ];
            countrating::create($data);
        } else{
            countrating::where('wisata_id', $travelid)->update([
                'totalrating' => $rating
            ]);
        }

        $review=reviews::where('id', $reviewid)->first();
        $bookingid=$review->booking_id;
        $booking=booking::where('id', $bookingid)->first();
        $travel=travel::where('wisata_id', $travelid)->first();
        $email=$booking->email;

        Mail::to($email)->send(new EmailConfirmation($travel, $review));
        Alert::success('Success');
        return redirect()->to('/');
    }
}
