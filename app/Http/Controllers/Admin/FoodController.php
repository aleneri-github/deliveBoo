<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    private $foodValidation = [
        'name' => 'required|string|max:50',
        'ingredients' => 'required',
        'price' => 'required|numeric|max:99.99',
        'image' => 'required|image',
        'visible' => 'required|boolean',
        'vegetarian' => 'required|boolean',
        'slug' => 'string',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::where('restaurant_id', Auth::id())->get();

        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->foodValidation);
        $data = $request->all();

        $newFood = new Food();

        $data["slug"] = Str::slug($data["name"]);
        $data["restaurant_id"] = Auth::id();

        if(!empty($data["image"])) {
            $data["image"] = Storage::disk('public')->put('images', $data["image"]);
        }

        $newFood->fill($data);
        $newFood->save();

        // Mail::to('test@mail.com')->send(new FoodMail());

        return redirect()->route('admin.foods.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('admin.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {

        $request->validate($this->foodValidation);

        $data = $request->all();

        $food->update($data);

        $data["slug"] = Str::slug($data["name"]);

        if(!empty($data["image"])) {
            // verifico se è presente un'immagine precedente, se si devo cancellarla
            if(!empty($food->image)) {
                Storage::disk('public')->delete($food->image);
            }

            $data["image"] = Storage::disk('public')->put('images', $data["image"]);
        }

        $food->update($data);


        return redirect()
            ->route('admin.foods.index')
            ->with('message', 'Il piatto '. $food->name. ' è stato aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()
                ->route('admin.foods.index')
                ->with('message', "Piatto " . $comic->name . " cancellato correttamente!");
    }
}
