<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
  public function index()
  {
    return view('guest.checkout');
  }

  public function store(Request $request)
  {
    $gateway = new \Braintree\Gateway([
        'environment' => env('BRAINTREE_ENVIRONMENT'),
        'merchantId' => env("BRAINTREE_MERCHANT_ID"),
        'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
        'privateKey' => env("BRAINTREE_PRIVATE_KEY")
    ]);
    $nonce = $request->nonce;
    $cart = json_decode($request->cart);
    dump($request->nonce);
    dump($request->total);
    dump($cart);
    if ($nonce != null) {
      $result = $gateway->transaction()->sale([
        'amount' => '10.00',
        'paymentMethodNonce' => $nonce,
        'options' => [
          'submitForSettlement' => True
        ]
      ]);
      return response()->json($result);
    }
  }
}
