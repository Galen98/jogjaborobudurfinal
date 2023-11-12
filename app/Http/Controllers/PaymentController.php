<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function testPayment(){
    $response = Http::withHeaders([
        'Client-Id' => 'MCH-0001-10791114622547',
        'Request-Id' => 'fdb69f47-96da-499d-acec-7cdc318ab2fe',
        'Request-Timestamp' => '2020-08-11T08:45:42Z',
        'Signature' => 'HMACSHA256=1jap2tpgvWt83tG4J7IhEwUrwmMt71OaIk0oL0e6sPM=',
    ])
    ->post('https://api-sandbox.doku.com/checkout/v1/payment', [
        'key' => 'value',
    ]);
}
}
