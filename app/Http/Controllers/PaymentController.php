<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DOKU\Client as client;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function testPayment(){
        // Instantiate class
        $DOKUClient = new client;
        // Set your Client ID
        $DOKUClient->setClientID('BRN-0286-1699886030538');
        // Set your Shared Key
        $DOKUClient->setSharedKey('SK-R9XuAX6DJNacoJsGeBEG');
        // Call this function for production use
        $DOKUClient->isProduction(false);

        $params = array(
            'customerEmail' => "email@gmail.com",
            'customerName' => "customerName",
            'amount' => "10000",
            'invoiceNumber' => "INV-300000000",
            'expiryTime' => "60",
            'info1' => "info1",
            'info2' => "info2",
            'info3' => "info3",
            'reusableStatus' => "false"
        );

        $DOKUClient->generateMandiriVa($params);
    }


    public function makeApiRequests()
    {
        $url = 'https://api-sandbox.doku.com/bca-virtual-account/v2/payment-code';
        $clientId = 'BRN-0286-1699886030538';
        $requestId = 'cc682442-6c22-493e-8121-b9ef6b3fa728';
        $timestamp = gmdate('Y-m-d\TH:i:s\Z');

        $headers = [
            'Client-Id' => $clientId,
            'Request-Id' => $requestId,
            'Request-Timestamp' => $timestamp,
            'Content-Type' => 'application/json',
        ];

        $body = [
            'order' => [
                'invoice_number' => 'INV-20210124-0001',
                'amount' => 150000,
            ],
            'virtual_account_info' => [
                'billing_type' => 'FIX_BILL',
                'expired_time' => 60,
                'reusable_status' => false,
                'info1' => 'Merchant Demo Store',
                'info2' => 'Thank you for shopping',
                'info3' => 'on our store',
            ],
            'customer' => [
                'name' => 'Jessica Tessalonika',
                'email' => 'jessica@example.com',
            ],
        ];

        


        $notificationBody = json_encode([
            'Client-Id' => $clientId,
            'Request-Id' => $requestId,
            'Request-Timestamp' => $timestamp,
            'Content-Type' => 'application/json',
        ]);
        $notificationPath = '/payments/notifications'; 
        $secretKey = 'SK-R9XuAX6DJNacoJsGeBEG'; 

        $digest = base64_encode(hash('sha256', $notificationBody, true));
        $rawSignature = "Client-Id:" . $headers['Client-Id'] . "\n"
            . "Request-Id:" . $headers['Request-Id'] . "\n"
            . "Request-Timestamp:" . $headers['Request-Timestamp'] . "\n"
            . "Request-Target:" . $notificationPath . "\n"
            . "Digest:" . $digest;

        $signature = base64_encode(hash_hmac('sha256', $rawSignature, $secretKey, true));
        $finalSignature = 'HMACSHA256=' . $signature;

        $headerss = [
            'Client-Id' => $clientId,
            'Request-Id' => $requestId,
            'Request-Timestamp' => $timestamp,
            'Content-Type' => 'application/json',
            'Signature' => $finalSignature
        ];

         // Handle the response as needed
         $response = Http::withHeaders($headerss)->post($url, $body);
         $statusCode = $response->status();
         $responseData = $response->json();

        if ($finalSignature == $headerss['Signature']) {
            // TODO: Process if Signature is Valid
            return response()->json(['status' => 'success', 'data' => $responseData]);
            //return response('OK', 200)->header('Content-Type', 'text/plain');
    
            // TODO: Do update the transaction status based on the `transaction.status`
        } else {
            // TODO: Response with 400 errors for Invalid Signature
            return response('Invalid Signature', 400)->header('Content-Type', 'text/plain');
        }
    }



    public function makeApiRequest(){
        $clientId = "BRN-0286-1699886030538";
        $requestId = "cc682442-6c22-493e-8121-b9ef6b3fa728";
        $requestDate = gmdate('Y-m-d\TH:i:s\Z');
        $targetPath = "/request-target/goes-here";
        $secretKey = "SK-R9XuAX6DJNacoJsGeBEG";
        $requestBody = array (
            'order' => array (
                'amount' => 15000,
                'invoice_number' => 'INV-20210124-0001',
            ),
            'virtual_account_info' => array (
                'expired_time' => 60,
                'reusable_status' => false,
                'info1' => 'Merchant Demo Store',
            ),
            'customer' => array (
                'name' => 'Taufik Ismail',
                'email' => 'taufik@example.com',
            ),
        );

        // Generate Digest
        $digestValue = base64_encode(hash('sha256', json_encode($requestBody), true));

        // Prepare Signature Component
        $componentSignature = "Client-Id:" . $clientId . "\n" . 
                            "Request-Id:" . $requestId . "\n" .
                            "Request-Timestamp:" . $requestDate . "\n" . 
                            "Request-Target:" . $targetPath . "\n" .
                            "Digest:" . $digestValue;
        
        // Calculate HMAC-SHA256 base64 from all the components above
        $signature = base64_encode(hash_hmac('sha256', $componentSignature, $secretKey, true));
        $headerSignature =  "Client-Id:" . $clientId ."\n". 
                            "Request-Id:" . $requestId . "\n".
                            "Request-Timestamp:" . $requestDate ."\n".
                            "Signature:" . "HMACSHA256=" . $signature;
        
        $finalSignature = 'HMACSHA256=' . $signature;
        $headerss = [
            'Client-Id' => $clientId,
            'Request-Id' => $requestId,
            'Request-Timestamp' => $requestDate,
            'Content-Type' => 'application/json',
            'Signature' => $finalSignature
        ];
        
        $url = 'https://api-sandbox.doku.com/bca-virtual-account/v2/payment-code';
        $response = Http::withHeaders($headerss)->post($url, $requestBody);
        $statusCode = $response->status();
        $responseData = $response->json();

        echo "your header request look like: \n".$response;
        echo "\r\n\n";
    }
}
