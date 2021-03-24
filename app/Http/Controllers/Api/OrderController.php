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
    for ($i = 0; $i < 12; $i++) {
      $currentInt = Carbon::now();
      $currentString = Carbon::now();
      $currentInt = [$currentInt->subMonth($i)->month, $currentInt->subMonth($i)->year];
      $currentMonthString = $currentString->subMonth($i)->isoFormat('MMMM-YYYY');
      dd($currentInt->subMonth($i)->isoFormat('MMMM-YYYY'));
      foreach ($orders as $value) {
        if ($value->created_at->month == $currentInt[0] && $value->created_at->year == $currentInt[1]) {
          array_push($ordersMonth, ['month' => ucfirst($currentMonthString), 'year' => $currentInt[1],'order' => $value]);
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

    return response()->json($dish);
  }

  public function bottomDish() {
    $items = DB::table('dish_order')->select('dish_id', DB::raw('COUNT(dish_id) as count_dishes'))
    ->groupBy('dish_id')
    ->orderBy('count_dishes','ASC')
    ->take(1)
    ->get();
    $dish = Dish::where('id', '=', $items[0]->dish_id)->get();

    return response()->json($dish);
  }

}
