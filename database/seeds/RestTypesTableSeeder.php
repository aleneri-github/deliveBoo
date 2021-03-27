<?php

use Illuminate\Database\Seeder;
use App\RestType;

class RestTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rest_types = [
          ['fast-food', "https://co-restaurants.roocdn.com/images/c34eeb453490a58d63bf0e2047d66de2e68b5033/shortcut/sandwich.png?width=334&height=176&fit=crop&bg-color=007e8a&auto=webp&format=png"],
          ['pizzeria', "https://co-restaurants.roocdn.com/images/d641b79eec519c87699c546baa2dcc3f792c422e/shortcut/pizza.png?width=250&height=130&fit=crop&bg-color=00ccbc&auto=webp&format=png"],
          ['asiatico', "https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/sushi-1.png?width=250&height=130&fit=crop&bg-color=440063&auto=webp&format=png"],
          ['italiano', "https://co-restaurants.roocdn.com/images/d641b79eec519c87699c546baa2dcc3f792c422e/shortcut/pasta.png?width=250&height=130&fit=crop&bg-color=00ccbc&auto=webp&format=png"],
          ['hamburger', "https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/burgers-1.png?width=250&height=130&fit=crop&bg-color=00ccbc&auto=webp&format=png"],
          ['vegetariano', "https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/organic.png?width=250&height=130&fit=crop&bg-color=9c006d&auto=webp&format=png"],
          ['steak-house', "https://co-restaurants.roocdn.com/images/d641b79eec519c87699c546baa2dcc3f792c422e/shortcut/barbeque-1.png?width=250&height=130&fit=crop&bg-color=007e8a&auto=webp&format=png"],
        ];

        foreach ($rest_types as $rest_type) {
          $newRest_type = new RestType();
          $newRest_type->name = $rest_type[0];
          $newRest_type->image = $rest_type[1];
          $newRest_type->save();
        }
    }

}
