<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Dish;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  public function orders() {

    $orders = Order::where('status', '=', 'submitted_for_settlement')->orderBy('created_at', 'DESC')->get();
    $ordersMonth = [];
    for ($i = 0; $i < 4; $i++) {
      $current = Carbon::today();
      $currentMonth = $current->subMonth($i)->month;
      $ordersMonth[$currentMonth] = [];
      foreach ($orders as $value) {
        if ($value->created_at->month == $currentMonth) {
          array_push($ordersMonth[$currentMonth], $value);
        }
      }
    }

    return response()->json($ordersMonth);
  }

  public function topDish() {
    $items = DB::table('dish_order')->select('dish_id', DB::raw('COUNT(dish_id) as count_dishes'))
    ->groupBy('dish_id')
    ->orderBy('count_dishes','DESC')
    ->take(1)
    ->get();
    $dish = Dish::where('id', '=', $items[0]->dish_id)->get();
    dd($dish);
  }

  public function bottomDish() {

  }

}
