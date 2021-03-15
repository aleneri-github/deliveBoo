<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
  public function index() {

    $restaurants = Restaurant::all();
    return response()->json($restaurants);
  }

  public function filter($type) {
    $rest = Restaurant::where('id',2)->firstOrFail();
    $restaurants = Restaurant::all();
    $_GET['type'] = ucfirst($type);
    $filtered = $restaurants->filter(function ($value, $key) {
      dd($value->types->getAttributes());
      return $value > 2;
    });

    $filtered->all();
    dd($rest->types);

    $_GET['type'] = ucfirst($type);
    $filteredRest = array_filter($restaurants, function($value) {
      dd($value->types);
      return in_array($_GET['type'], $value->types);
    });
    return response()->json($filteredRest);
  }

}
