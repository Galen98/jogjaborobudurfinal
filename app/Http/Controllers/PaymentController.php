<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Omnipay\Omnipay;
use Mail;
use App\Models\Payment;
use App\Models\countrating;
use App\Models\booking;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\ImageManagerStatic as Image;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);
    }

    public function addCart(Request $request){
        $token = Str::random(40);
        $tokenExpirationServer = Carbon::now()->addMinutes(60);
        $customerTimezone = Request('timezone');
        $tokenExpirationCustomer = Carbon::now($customerTimezone)->addMinutes(60);
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
        $currency=Request('currency');
        $amount=Request('amount');

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
            'country'=>$countrys,
            'token'=>$token,
            'token_expired_at'=>$tokenExpirationServer,
            'cust_time'=>$tokenExpirationCustomer,
            'amount'=>$amount,
            'currency'=>$currency
        ];

        $booking=booking::create($data);

        // $data['email'] = $email;
        // $data['email2'] = 'herucod@gmail.com';
        // $data['subject'] = 'Complete your payment - Jogja Borobudur Tours & Travel';
    
        // $book['body'] = booking::where('id', $booking->id)->first();
        // Mail::send('payment.emailPayment', $book, function($message)use($data) {
        //     $message->to($data['email'], $data['email'])
        //             ->subject($data['subject']);
        // }); 
        // Mail::send('payment.emailPayment', $book, function($message)use($data) {
        //     $message->to($data['email2'], $data['email2'])
        //             ->subject($data['subject']);
        // }); 
        
        toast('Your order has been saved!','success');
        
        return redirect('/payment/'.$booking->token);
        }

    public function paymentMethod($token){
        $tokenExist = booking::where('token', $token)->exists();
        if($tokenExist){
            $data = booking::where('token', $token)->first();
            $ratingGet=countrating::where('wisata_id', $data->wisata_id)->first();
            if($ratingGet == null){
                $rating = null;
            } else{
            $rating=$ratingGet->totalrating;
            }
            return view('payment.booking', compact('data', 'rating'));
        }
        else{
            toast('Your payment process has been expired!','error');
            return redirect()->to('/');
        }
    }

    public function pay(Request $request){
        $idBooking = $request->bookingId;
        $exists = booking::where('id', $idBooking)->exists();
        if($exists){ 
        try{
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => $request->currency,
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            $idBooking = $request->bookingId;
            $arr = $response->getData();
            booking::where('id', $idBooking)->update([
                'pay_id' => $arr['id']
            ]);

            if($response->isRedirect()){
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch(\Throwable $th){
            return $th->getMessage();
        } 
        } else{
            toast('Your payment process has been expired!','error');
            return redirect()->to('/');
        }
    }

    public function success(Request $request){
        if ($request->input('paymentId') && $request->input('PayerID')){
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();


            if($response->isSuccessful()){
                $arr = $response->getData();
                $bookingId = booking::where('pay_id', $arr['id'])->first();
                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->booking_id = $bookingId->id;
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = $arr['transactions'][0]['amount']['currency'];;
                $payment->payment_status = $arr['state'];

                $payment->save();

                booking::where('id', $bookingId->id)->update([
                    'token' => null,
                    'cust_time' => null,
                    'token_expired_at' => null
                ]);

                $bookings = booking::where('id', $bookingId->id)->first();
                $data['email'] = $bookings->email;
                $data['email2'] = 'herucod@gmail.com';
                $data['email3'] = 'kitchennyonyo@gmail.com';
                $data['subject'] = 'Booking Order Jogja Borobudur Tours & Travel';
                $booking['body'] = $bookings;

                Mail::send('payment.emailAfterPayment', $booking, function($message)use($data) {
                    $message->to($data['email'], $data['email'])
                            ->cc('herucod@gmail.com','kitchennyonyo@gmail.com')
                            ->subject($data['subject']);     
                }); 

                Mail::send('payment.emailAfterPayment', $booking, function($message)use($data) {
                    $message->to($data['email2'], $data['email2'])
                            ->subject($data['subject']);     
                }); 

                Mail::send('payment.emailAfterPayment', $booking, function($message)use($data) {
                    $message->to($data['email3'], $data['email3'])
                            ->subject($data['subject']);     
                }); 

                toast('Your payment success!','success');
                return redirect()->to('/');
            }
            else{
                return $response->getMessage();
            }
        }
        else{
        toast('User decline the payment!','error');
        return redirect()->to('/');
        }
    }

    public function error() {
        toast('User decline the payment!','error');
        return redirect()->to('/');
    }

    public function formBankTransfer(Request $request) {
        $bookingId = $request->idBooking;
        $token_bank = booking::where('id', $bookingId)->exists();
        $bookingData = booking::where('id', $bookingId)->first();
        if($token_bank) {
            return view('payment.formBankTransfer', compact('bookingId','bookingData'));
        } else {
            toast('Your payment process has been expired!','error');
            return redirect()->to('/');
        }
    }

    public function transferBankProcess(Request $request) {
        $bookingId = $request->bookingId;
        if($bookingId) {
            $request->validate([
                'proffPay' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ], [
                'proffPay.required' => 'Please upload your proof of payment.',
                'proffPay.image' => 'The uploaded file must be an image.',
                'proffPay.mimes' => 'Only JPEG and PNG files are allowed.',
                'proffPay.uploaded' => 'Maximum file size is 2MB.',
            ]);
            
        $proffPay = $request->file('proffPay');
        $bookingData = booking::where('id', $bookingId)->first();
        $image = Image::make($proffPay->getRealPath());
        $image->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $nama_file = $bookingData->id . "_" . $bookingData->name . time();
        $tujuan_upload = 'public/proff';
        $image->encode('jpg', 80)->save(($tujuan_upload . '/' . pathinfo($nama_file, PATHINFO_FILENAME) . '.jpg'));

        booking::where('id', $bookingId)->update([
            'proff_of_payment' => pathinfo($nama_file, PATHINFO_FILENAME) . '.jpg',
            'token' => null,
            'cust_time' => null,
            'token_expired_at' => null
        ]);

        $data['email'] = $bookingData->email;
        $data['email2'] = 'herucod@gmail.com';
        $data['email3'] = 'kitchennyonyo@gmail.com';
        $data['subject'] = 'Booking Order Jogja Borobudur Tours & Travel';
        $booking['body'] = $bookingData;

        Mail::send('payment.emailAfterPayment', $booking, function($message)use($data) {
                $message->to($data['email'], $data['email'])
                    ->cc('herucod@gmail.com','kitchennyonyo@gmail.com')
                    ->subject($data['subject']);     
        }); 

        Mail::send('payment.emailAfterPayment', $booking, function($message)use($data) {
            $message->to($data['email2'], $data['email2'])
                    ->subject($data['subject']);     
        }); 

        Mail::send('payment.emailAfterPayment', $booking, function($message)use($data) {
            $message->to($data['email3'], $data['email3'])
                    ->subject($data['subject']);     
        }); 

        toast('Thank you for submitting your payment, your booking voucher have been sent to your email!','success');
        return redirect()->to('/');
        } else {
        toast('Your payment process has been expired!','error');
        return redirect()->to('/');
        }
    }


    public function downloadProff($proff) {
        $filePath = 'public/proff/'.$proff;
        return response()->download($filePath);
    }

    public function payTransfer(Request $request){
        $idBooking = $request->idBooking;
        $exists = booking::where('id', $idBooking)->exists();
        if($exists){
        $bookings = booking::where('id', $idBooking)->first();
        $data['email'] = $bookings->email;
        $data['email2'] = 'herucod@gmail.com';
        $data['email3'] = 'kitchennyonyo@gmail.com';
        $data['subject'] = 'Payment Confirmation Jogja Borobudur Tours & Travel';
        $booking['body'] = $bookings;

        Mail::send('payment.emailBank', $booking, function($message)use($data) {
            $message->to($data['email'], $data['email'])
                    ->cc('herucod@gmail.com','kitchennyonyo@gmail.com')
                    ->subject($data['subject']);     
        }); 

        Mail::send('payment.emailBank', $booking, function($message)use($data) {
            $message->to($data['email2'], $data['email2'])
                    ->subject($data['subject']);    
        });
        
        Mail::send('payment.emailBank', $booking, function($message)use($data) {
            $message->to($data['email3'], $data['email3'])
                    ->subject($data['subject']);    
        });

        booking::where('id', $idBooking)->update([
            'token' => null,
            'cust_time' => null,
            'token_expired_at' => null
        ]);

        Alert::success('Success','Please check your email for our confirmation');
        return redirect()->to('/');
    } else{ 
        toast('Your payment process has been expired!','error');
        return redirect()->to('/');
    }
    }

    public function payVoucher(Request $request){

        $idBooking = $request->idBooking;
        $exists = booking::where('id', $idBooking)->exists();
        if($exists){
        $bookings = booking::where('id', $idBooking)->first();
        $data['email'] = $bookings->email;
        $data['email2'] = 'herucod@gmail.com';
        $data['email3'] = 'kitchennyonyo@gmail.com';
        $data['subject'] = 'Payment Booking Order Jogja Borobudur Tours & Travel';
        $booking['body'] = $bookings;

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

        booking::where('id', $idBooking)->update([
            'token' => null,
            'cust_time' => null,
            'token_expired_at' => null
        ]);

        toast('send email success!','success');
        return redirect()->back();
    } else{ 
        toast('Your payment process has been expired!','error');
        return redirect()->back();
    }
    }


    public function deleteExpiredBookings()
    {
    $expiredBookings = booking::where('token_expired_at', '<', now())->get();

    foreach ($expiredBookings as $booking) {
        $booking->delete();
    }
    }
    
}
