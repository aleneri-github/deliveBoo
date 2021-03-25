<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Dish;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

  public function __construct()
    {
      $this->middleware('auth:api');
    }


  public function orders() {

    $rest = Restaurant::where('user_id', Auth::id())->firstOrFail();
    $myOrdersIds = [];

    foreach ($rest->dishes as $dish) {
      $orders = DB::table('dish_order')->select('order_id')->where('dish_id', '=', $dish->id)->get();
      foreach($orders as $order) {
        if (in_array($order->order_id, $myOrdersIds)) {
          //DO NOTHING
        } else {
          array_push($myOrdersIds, $order->order_id);
        }
      }
    }
    $orders = Order::where('status', '=', 'submitted_for_settlement')->orderBy('created_at', 'DESC')->get();
    $filteredOrders = $orders->filter(function($value) use ($myOrdersIds) {
      return in_array($value->id, $myOrdersIds);
    });
    $ordersMonth = [];
    for ($i = 0; $i < 12; $i++) {
      $currentInt = Carbon::now();
      $currentString = Carbon::now();
      $currentMonthInt = $currentInt->subMonth($i)->month;
      $currentMonthString = $currentString->subMonth($i)->isoFormat('MMMM');
      foreach ($filteredOrders as $value) {
        if ($value->created_at->month == $currentMonthInt) {
          array_push($ordersMonth, ['month' => ucfirst($currentMonthString), 'year' => $value->created_at->year,'order' => $value]);
        }
      }
    }
    return response()->json($ordersMonth);
  }

  public function topDish() {
    $rest = Restaurant::where('user_id', Auth::id())->firstOrFail();
    $myDishesList = [];
    foreach ($rest->dishes as $dish) {
      $dishes = DB::table('dish_order')->select('dish_id')->where('dish_id', '=', $dish->id)->get();
      array_push($myDishesList, $myDishesList[$dish->id] = $dishes->count());
    }
    foreach ($myDishesList as $key => $value) {
      if ($value == max($myDishesList)) {
        $dish = Dish::where('id', '=', $key)->get();
      }
    }
    dd($dish);
    return response()->json($dish);

  }

  public function bottomDish() {

    $rest = Restaurant::where('user_id', Auth::id())->firstOrFail();
    $myDishesList = [];
    foreach ($rest->dishes as $dish) {
      $dishes = DB::table('dish_order')->select('dish_id')->where('dish_id', '=', $dish->id)->get();
      array_push($myDishesList, $myDishesList[$dish->id] = $dishes->count());
    }
    foreach ($myDishesList as $key => $value) {
      if ($value == min($myDishesList)) {
        $dish = Dish::where('id', '=', $key)->get();
      }
    }
    dd($dish);
    return response()->json($dish);

  }

}
