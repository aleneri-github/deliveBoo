<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
  public function index() {

    $restaurants = Restaurant::all();

    if ($_GET['type'] != 'all') {
      $filtered = $restaurants->filter(function ($value, $key) {
        return in_array(ucfirst($_GET['type']), $value->types->pluck('name')->toArray());
      });
      return response()->json($filtered);
    } else {
      return response()->json($restaurants);
    }

  }

}
