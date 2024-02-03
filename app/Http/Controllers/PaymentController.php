<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request){

        try{
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => $request->currency,
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if($response->isRedirect()){
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    public function success(Request $request){
        if ($request->input('paymentId') && $request->input('PayerID')){
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();
        }
    }
}
