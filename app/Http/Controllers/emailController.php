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
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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

        $data['email'] = $email;
        $data['email2'] = 'herucod@gmail.com';
        $data['email3'] = 'kitchennyonyo@gmail.com';
        $data['subject'] = 'Booking Order Jogja Borobudur Tours & Travel';
    
        $booking['body'] = booking::latest()->paginate(1);
        Mail::send('frontend.bodyemail', $booking, function($message)use($data) {
            $message->to($data['email'], $data['email'])
                    ->cc('herucod@gmail.com','kitchennyonyo@gmail.com')
                    ->subject($data['subject']);
                   
        }); 

        Mail::send('frontend.bodyemail', $booking, function($message)use($data) {
            $message->to($data['email2'], $data['email2'])
                    ->subject($data['subject']);
                    
        }); 

        Mail::send('frontend.bodyemail', $booking, function($message)use($data) {
            $message->to($data['email3'], $data['email3'])
                    ->subject($data['subject']);
                    
        }); 

        Alert::success('Success','Please check your email for our confirmation');
        return redirect()->to('/');
    }

    public function replyEmail(Request $request) {
    try{
        $validator = Validator::make($request->all(), [
            'emailto' => 'required|email',
            'emailreply' => 'required|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,webp,gif,pdf|max:2048'
        ]);

        if($validator->fails()){
            $errorMassage = implode("\n", $validator->errors()->all());
        }
        
        $to = $request->emailto;
        $message = $request->emailreply;
    
        Mail::send([], [], function ($mail) use ($to, $message, $request) {
            $mail->to($to)
                 ->cc('herucod@gmail.com','kitchennyonyo@gmail.com')
                 ->subject('No-reply message from JogjaBorobudur')
                 ->html($message);
    
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $mail->attach($file->getRealPath(), [
                        'as' => $file->getClientOriginalName(),
                        'mime' => $file->getMimeType(),
                    ]);
                }
            }
        });
    
        Alert::success('Success','Success send email.');
        return redirect()->back();
    } 
     catch(\Exception $e) {
        Alert::error('Error', 'Something went wrong: ' . $e->getMessage());
        return redirect()->back()->withInput();
    }   
}
}