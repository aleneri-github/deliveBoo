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
          'fast_food',
          'pizzeria',
          'sushi',
          'italiano',
          'hamburger',
          'vegetariano',
          'stack House',
          'asiatico'
        ];

        foreach ($rest_types as $rest_type) {
          $newRest_type = new RestType();
          $newRest_type->name = $rest_type;
          $newRest_type->save();
        }
    }

}
