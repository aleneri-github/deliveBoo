<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Dish;
use App\Restaurant;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $restaurants = Restaurant::all();
      foreach ($restaurants as $restaurant) {

        for ($i=0; $i < 15 ; $i++) {
          // Creazione istanza
          $newFood = new Dish();
          // Valorizza propietà
          $newFood->restaurant_id = $restaurant->id;
          $newFood->name = $faker->word;
          $newFood->slug = Str::slug($newFood->name);
          $newFood->ingredients = $faker->text(100);
          $newFood->description = $faker->text(200);
          $newFood->price = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 99);
          $newFood->image = $faker->imageUrl(640,480, 'food');
          $newFood->vegetarian = $faker->boolean();
          $newFood->visible = $faker->boolean();
          // Salvataggio
          $newFood->save();
        }
      }
    }
}
