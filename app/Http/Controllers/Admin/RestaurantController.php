<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{   
    private $restaurantValidation = [
        'name' => 'required|string|max:50',
        'address' => 'required|string|max:50',
        'phone_number' => 'required|string|max:50',
        'website' => 'required|string|max:50',
        'email_rest' => 'required|string|max:50',
        'image' => 'required|string|max:255',
        'vat' => 'required|string|max:11',
        'slug' => 'string'
    ];

    public function create()
    {
        return view('admin.restaurant.create');
    }

    public function store(Request $request)
    {   
        $request->validate($this->restaurantValidation);
        $data = $request->all();

        $newRestaurant = new Restaurant();

        $data["user_id"] = Auth::id();

        if(!empty($data["image"])) {
            $data["image"] = Storage::disk('public')->put('images', $data["image"]);
        }

        $newRestaurant->fill($data);
        $newRestaurant->save();

        // Mail::to('test@mail.com')->send(new RestaurantMail());

        return redirect()->route('admin.foods.index');

    }
}
