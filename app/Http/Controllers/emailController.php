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
        $data['email2'] = 'galen.riandito@ti.ukdw.ac.id';
        $data['subject'] = 'Booking Order Jogja Borobudur Tours & Travel'; // subject email
    
        $booking['body'] = booking::latest()->paginate(1); //Ambil data postingan dari table di database
		
        //Ganti posts.postsPDF dengan file yang akan di jadikan .pdf
        // $pdf = PDF::loadView('frontend.invoice', $booking); // generate file .pdf
        
        //Ganti posts.sendPDF dengan file yang akan di jadikan body email
        Mail::send('frontend.bodyemail', $booking, function($message)use($data) {
            $message->to($data['email'], $data['email'])
                    ->subject($data['subject']);
                    // ->attachData($pdf->output(), time() .'_'.'data.pdf');
        }); //kirim lampiran file pdf melakui email 

        Mail::send('frontend.bodyemail', $booking, function($message)use($data) {
            $message->to($data['email2'], $data['email2'])
                    ->subject($data['subject']);
                    // ->attachData($pdf->output(), time() .'_'.'data.pdf')
        }); //kirim lampiran file pdf melakui email 

        Alert::success('Success','Please check your email for our confirmation');
        return redirect()->to('/');
        

    }

}