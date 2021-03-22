<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class CheckoutController extends Controller
{

  private $orderValidation = [
    'name' => ['required', 'string', 'max:50'],
    'surname' => ['required', 'string', 'max:50'],
    'buyer_address' => ['required', 'string', 'max:50'],
    'buyer_email' => ['required', 'string', 'email', 'max:255'],
    'status' => ['required', 'string', 'max:50'],
    'total' => ['required', 'numeric', 'max:9999', 'min:0']
  ];

  public function index(){
    $gateway = new \Braintree\Gateway([
      'environment' => env('BRAINTREE_ENVIRONMENT'),
      'merchantId' => env("BRAINTREE_MERCHANT_ID"),
      'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
      'privateKey' => env("BRAINTREE_PRIVATE_KEY")
    ]);
    $token = $gateway->clientToken()->generate();
    return view ('guest.checkout', compact('token'));
  }

  public function store(Request $request)
  {
    $gateway = new \Braintree\Gateway([
      'environment' => env('BRAINTREE_ENVIRONMENT'),
      'merchantId' => env("BRAINTREE_MERCHANT_ID"),
      'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
      'privateKey' => env("BRAINTREE_PRIVATE_KEY")
    ]);

    $data = $request->all();
    $data['name'] = 'pinco';
    $data['surname'] = 'pinco';
    $data['buyer_address'] = 'pinco';
    $data['buyer_email'] = 'l.gentili@email.com';
    $data['status'] = 'OK';
    $data['foods'] = [];
    $nonce = $data['nonce'];
    $cart = json_decode($request->cart);
    dump($cart);
    $order = new Order();
    // manca lo status che prendo una volta che il pagamento è stato fatto!
    $order->fill($data);

    foreach ($cart as $value) {
      for($i = 1; $i <= $value->quantity; $i++) {
        array_push($data['foods'], $value->id);
      }
    }
    dd($data['foods']);
    $order->dishes()->attach($data['foods']);
    dd($order);

    if ($nonce != null) {
      $result = $gateway->transaction()->sale([
        'amount' => $order->total,
        'paymentMethodNonce' => $nonce,
        'options' => [
          'submitForSettlement' => True
        ]
      ]);
      return response()->json($result->succes);
    }
  }
}
