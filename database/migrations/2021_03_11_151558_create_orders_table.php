<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('status', 50);
            $table->string('buyer_address', 50);
            $table->float('total', 6,2);
            $table->string('buyer_email', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}


// $table->id();
// $table->unsignedBigInteger('restaurant_id');
// $table->string('name', 50);
// $table->text('ingredients');
// $table->text('description')->nullable(); // ?
// $table->float('price', 4,2);
// $table->string('image');
// $table->boolean('visible');
// $table->boolean('vegetarian');
// $table->string('slug', 50);
// $table->timestamps();
//
// //DB relations
// $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');


// $table->id();
// $table->unsignedBigInteger('food_id');
// $table->unsignedBigInteger('order_id');
//
// //DB relations
// $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
// $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
