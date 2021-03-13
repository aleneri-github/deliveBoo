<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    private $dishValidation = [
        'name' => 'required|string|max:50',
        'ingredients' => 'required',
        'price' => 'required|numeric|max:99',
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
        $dishes = Dish::where('restaurant_id', Auth::id())->get();
        // GESTIONE ASSENZA DI PIATTI
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
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
        $data = $request->all();

        $newDish = new Dish();

        $data["slug"] = Str::slug($data["name"]);
        $data["restaurant_id"] = Auth::id();

        if(!empty($data["image"])) {
            $data["image"] = Storage::disk('public')->put('images', $data["image"]);
        }

        $newDish->fill($data);
        $newDish->save();

        // Mail::to('test@mail.com')->send(new FoodMail());

        return redirect()->route('admin.dishes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
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
}