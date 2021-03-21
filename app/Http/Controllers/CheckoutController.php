<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
  public function index(){

    // $gateway = new \Braintree\Gateway([
    //     'environment' => env('BRAINTREE_ENVIRONMENT'),
    //     'merchantId' => env("BRAINTREE_MERCHANT_ID"),
    //     'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
    //     'privateKey' => env("BRAINTREE_PRIVATE_KEY")
    // ]);
    //     $clientToken = $gateway->clientToken()->generate();
        return view ('guest.checkout');
  }

  public function store(Request $request)
  {
    $gateway = new \Braintree\Gateway([
        'environment' => env('BRAINTREE_ENVIRONMENT'),
        'merchantId' => env("BRAINTREE_MERCHANT_ID"),
        'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
        'privateKey' => env("BRAINTREE_PRIVATE_KEY")
    ]);
    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];
    //
    $result = $gateway->transaction()->sale([
      'amount' => '10.00',
      'paymentMethodNonce' => $nonce,
      'options' => [
        'submitForSettlement' => True
      ]
    ]);
    return redirect()->route('guest.index');
  }
}
