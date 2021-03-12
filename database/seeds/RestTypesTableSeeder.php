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
          'Fast Food',
          'Pizzeria',
          'Sushi',
          'Italiano',
          'Hamburger',
          'Vegetariano',
          'Stack House',
          'Asiatico'
        ];

        foreach ($rest_types as $rest_type) {
          $newRest_type = new RestType();
          $newRest_type->name = $rest_type;
          $newRest_type->save();
        }
    }

}
