<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Dish;
use App\RestType;

class RestaurantController extends Controller
{
  public function index() {

    $restaurants = Restaurant::all();
    // $dishes = Dish::where('restaurant_id', 2)->get();
    if ($_GET['type'] != 'all') {
      $filtered = $restaurants->filter(function ($value, $key) {
        return in_array($_GET['type'], $value->types->pluck('name')->toArray());
      });
      return response()->json($filtered);
    } else {
      return response()->json($restaurants);
    }
    return response()->json($dishes);
  }

  public function types() {

    $types = RestType::all()->pluck('name');

    return response()->json($types);

  }

  public function dishes() {

    $dishes = Dish::orderBy('created_at', 'DESC')->take(10)->get();

    return response()->json($dishes);

  }

  public function carousel() {

    $data = config('types');

    return response()->json($data);

  }
}
