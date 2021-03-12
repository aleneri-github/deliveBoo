<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('beverage_id');
            $table->integer('quantity_food');
            $table->float('tot_food', 5,2);
            $table->integer('quantity_beverage');
            $table->float('tot_beverage', 5,2);
            $table->timestamps();

            //DB relations
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('beverage_id')->references('id')->on('beverages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
