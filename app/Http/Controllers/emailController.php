<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\booking;
use PDF;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class emailController extends Controller
{
    
    public function sendPDF(Request $request)
    {
        $countrys=Request('negaras');
        $email=Request('email');
        $surname=Request('surname');
        $name=Request('name');
        $negara=Request('country');
        $phone=Request('phone');
        $pickup=Request('pickup');
        $namawisata=Request('namawisata');
        $paketwisata=Request('paketwisata');
        $tanggal=Request('tanggal');
        $adult=Request('adult');
        $child=Request('child');
        $idoption=Request('idoption');
        $idtravel=Request('idtravel');
        $waktu=Request('waktu');
        $total=Request('total');
        $group=Request('group');
        $totalgroup=Request('totalgroup');
        $request=Request('request');

        $data = [
            'email'=>$email,
            'name'=>$name,
            'code'=>$negara,
            'phone'=>$phone,
            'paketwisata'=>$namawisata,
            'namawisata'=>$paketwisata,
            'wisata_id'=>$idtravel,
            'subwisata_id'=>$idoption,
            'traveldate'=>$tanggal,
            'time'=>$waktu,
            'adult'=>$adult,
            'child'=>$child,
            'participants'=>$group,
            'total'=>$total,
            'totalgroup'=>$totalgroup,
            'pickup'=>$pickup,
            'request'=>$request,
            'surname'=>$surname,
            'country'=>$countrys

        ];

        booking::create($data);

        $data['email'] = $email; //email penerima
        $data['email2'] = 'herucod@gmail.com';
        $data['subject'] = 'Booking Order Jogja Borobudur Tours & Travel'; // subject email
    
        $booking['body'] = booking::latest()->paginate(1);
        Mail::send('frontend.bodyemail', $booking, function($message)use($data) {
            $message->to($data['email'], $data['email'])
                    ->subject($data['subject']);
                   
        }); 

        Mail::send('frontend.bodyemail', $booking, function($message)use($data) {
            $message->to($data['email2'], $data['email2'])
                    ->subject($data['subject']);
                    
        }); 

        Alert::success('Success','Please check your email for our confirmation');
        return redirect()->to('/');
        

    }

}