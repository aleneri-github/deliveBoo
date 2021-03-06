<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use App\Restaurant;
use Illuminate\Support\Str;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

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
    $nonce = $data['nonce'];
    if ($nonce != null) {
      $result = $gateway->transaction()->sale([
        'amount' => $data['total'],
        'paymentMethodNonce' => $nonce,
        'options' => [
          'submitForSettlement' => True
        ]
      ]);
      if ($result->success) {
        $data['status'] = $result->transaction->status;
        $data['dishes'] = [];
        $cart = json_decode($request->cart);
        $order = new Order();
        $order->fill($data);
        $order->save();
        foreach ($cart as $value) {
          for($i = 1; $i <= $value->quantity; $i++) {
            array_push($data['dishes'], $value->id);
          }
        }
        Mail::to($data['buyer_email'])->send(new OrderMail($order, $cart));
        $order->dishes()->attach($data['dishes']);
        return view('guest.success');
      } else {
        return redirect()->route('guest.checkout.index')->with('message', 'Errore transazione!');
      }
    }
  }
}
