<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Dish;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function show($slug) {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();
        // $dishes = Dish::where('restaurant_id', $restaurant->id);
        return view('guest.show', compact('restaurant'));
    }

    // public function show($slug) {
    //     $restaurant = Restaurant::where('slug', $slug)->firstOrFail();
    //     // $dishes = Dish::where('restaurant_id', $restaurant->id);
    //     return view('guest.show', compact('restaurant'));
    // }
}
