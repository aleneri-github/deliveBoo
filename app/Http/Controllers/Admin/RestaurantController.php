<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\RestType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    private $restaurantValidation = [
        'name' => 'required|string|max:50',
        'address' => 'required|string|max:50',
        'phone_number' => 'required|string|regex:/^[+]?[0-9]+$/',
        'website' => 'required|string|max:50',
        'email_rest' => 'required|email|max:50',
        'image' => 'required|image',
        'vat' => 'required|string|size:11|regex:/^[0-9]+$/',
        'slug' => 'string'
    ];

    public function create()
    {
        $types = RestType::all();
        return view('admin.restaurant.create', compact('types'));
    }

    public function store(Request $request)
    {   $data = $request->all();
        // $request->validate($this->restaurantValidation);
        // $data = $request->all();
        $newRestaurant = new Restaurant();

        $data["user_id"] = Auth::id();
        $data["slug"] = Str::slug($data['name'], '-');
        if(!empty($data["image"])) {
            $data["image"] = Storage::disk('public')->put('images', $data["image"]);
        }

        $newRestaurant->fill($data);
        $newRestaurant->save();

        if(!empty($data['types'])) {
          $newRestaurant->types()->attach($data['types']);
        }

        return redirect()->route('admin.foods.index');


    }
}
