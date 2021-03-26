<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use App\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    private $dishValidation = [
        'name' => 'required|string|max:50',
        'ingredients' => 'required',
        'price' => 'required|numeric|max:99',
        'image' => 'image',
        'visible' => 'boolean',
        'vegetarian' => 'boolean'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // con first or fail trovo l'oggetto
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        if (!$restaurant) {
          return redirect()->route('admin.restaurant.create');
        }
        // con get prendo una collection
        $dishes = Dish::where('restaurant_id', $restaurant->id)->get();
        // GESTIONE ASSENZA DI PIATTI
        return view('admin.dishes.index', compact('dishes', 'restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->firstOrFail();
        return view('admin.dishes.create', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->dishValidation);
        $rest = Restaurant::where('user_id', Auth::id())->firstOrFail();
        $data = $request->all();

        $data["slug"] = Str::slug($data["name"]);

        $dish = Dish::where('slug', $data["slug"])->get();
        if (!$dish->isEmpty()) {
          return redirect()->route('admin.dishes.create')->with('message', 'Il piatto che stia creando esiste già nel Database');
        }

        $newDish = new Dish();


        $data["restaurant_id"] = $rest->id;

        if(empty($data["vegetarian"])) {
            $data["vegetarian"] = 0;
        }

        if(empty($data["visible"])) {
            $data["visible"] = 0;
        }

        if(!empty($data["image"])) {
            $data["image"] = Storage::disk('public')->put('images', $data["image"]);
        }

        $newDish->fill($data);
        $newDish->save();

        // Mail::to('test@mail.com')->send(new FoodMail());

        return redirect()->route('admin.dishes.index')->with('message', 'Piatto aggiunto correttamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->firstOrFail();
        $dish = Dish::where('slug', $slug)->firstOrFail();
        return view('admin.dishes.show', compact('dish', 'restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->firstOrFail();
        return view('admin.dishes.edit', compact('dish', 'restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {

        $request->validate($this->dishValidation);

        $data = $request->all();

        $dish->update($data);

        $data["slug"] = Str::slug($data["name"]);

        if(empty($data["vegetarian"])) {
            $data["vegetarian"] = 0;
        }

        if(empty($data["visible"])) {
            $data["visible"] = 0;
        }

        if(!empty($data["image"])) {
            // verifico se è presente un'immagine precedente, se si devo cancellarla
            if(!empty($dish->image)) {
                Storage::disk('public')->delete($dish->image);
            }

            $data["image"] = Storage::disk('public')->put('images', $data["image"]);
        }

        $dish->update($data);


        return redirect()
            ->route('admin.dishes.index')
            ->with('message', 'Il piatto '. $dish->name. ' è stato aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()
                ->route('admin.dishes.index')
                ->with('message', "Piatto " . $dish->name . " cancellato correttamente!");
    }

     public function order() {

        $restaurant = Restaurant::where('user_id', Auth::id())->firstOrFail();
        return view('admin.dishes.statistics', compact('restaurant'));
    }
}
