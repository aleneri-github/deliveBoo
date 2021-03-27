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
      // non funge, mi fa vedere per ogni piatto la tabella ordini! Provato pivot e non funge
      // dd($dish->orders);
      // dd($dish->pivot->order_id);
      $orders = DB::table('dish_order')->select('order_id')->where('dish_id', '=', $dish->id)->get();
      foreach($orders as $order) {
        if (!in_array($order->order_id, $myOrdersIds)) {
          array_push($myOrdersIds, $order->order_id);
        }
      }
    }
    $orders = Order::where('status', '=', 'submitted_for_settlement')->orderBy('created_at', 'DESC')->get();
    $filteredOrders = $orders->filter(function($value) use ($myOrdersIds) {
      return in_array($value->id, $myOrdersIds);
    });
    $dataOrders = [];
    $dataTotal = [];
    $months = [];
    $monthsYears = [];
    for ($i = 0; $i < 12; $i++) {
      $currentMonth = Carbon::now();
      $currentYear = Carbon::now();
      $currentMonthString = $currentMonth->subMonth($i)->isoFormat('MMMM');
      $currentYearString = $currentYear->subMonth($i)->isoFormat('YYYY');
      array_push($months, ucfirst($currentMonthString));
      array_push($monthsYears, ucfirst($currentMonthString). '-' .$currentYearString);
    }
    foreach ($months as $month) {
      $bool = false;
      foreach ($filteredOrders as $order) {
        if (strtolower($month) == $order->created_at->isoFormat('MMMM')) {
          array_push($dataOrders, count($filteredOrders->filter( function($value) use ($month) { return strtolower($month) == $value->created_at->isoFormat('MMMM'); } )));
          $bool = true;
          break;
        } else {
          continue;
        }
      }
      if ($bool == false) {
        array_push($dataOrders, 0);
      }
    }

    foreach ($months as $month) {
      $prova = $filteredOrders->filter(function($value) use ($month) {
        return strtolower($month) == $value->created_at->isoFormat('MMMM');
      })->toArray();
      if ($prova) {
        $total = array_reduce($prova, function($carry, $item) {
          $carry += $item['total'];
          return $carry;
        });
      } else {
        $total = 0;
      }
      array_push($dataTotal, $total);
    }
    return response()->json(['months' => $monthsYears, 'values' => $dataOrders, 'total' => $dataTotal]);
  }


  public function topDish() {
    $rest = Restaurant::where('user_id', Auth::id())->firstOrFail();
    $myDishesList = [];
    $dish = '';
    foreach ($rest->dishes as $dish) {
      $dishes = DB::table('dish_order')->select('dish_id')->where('dish_id', '=', $dish->id)->get();
      // dump($dishes);
      // in caso riprovare col push
      array_merge($myDishesList, array($myDishesList[$dish->id] = $dishes->count()));
    }

    foreach ($myDishesList as $key => $value) {
      if ($value == max($myDishesList)) {
        $dish = Dish::where('id', '=', $key)->get();
      }
    }

    if ($dish != '') {
      return response()->json($dish);
    } else {
      return response()->json(['']);
    }

  }

  public function bottomDish() {

    $rest = Restaurant::where('user_id', Auth::id())->firstOrFail();
    $myDishesList = [];
    $dish = '';
    foreach ($rest->dishes as $dish) {
      $dishes = DB::table('dish_order')->select('dish_id')->where('dish_id', '=', $dish->id)->get();
      array_merge($myDishesList, array($myDishesList[$dish->id] = $dishes->count()));
    }
    foreach ($myDishesList as $key => $value) {
      if ($value == min($myDishesList)) {
        $dish = Dish::where('id', '=', $key)->get();
      }
    }

    if ($dish != '') {
      return response()->json($dish);
    } else {
      return response()->json(['']);
    }

  }

}
