<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beverages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->string('name', 50);
            $table->string('brand', 50);
            $table->float('average_alcohol', 4,2);
            $table->string('type', 50);
            $table->text('description')->nullable();
            $table->float('price', 4,2);
            $table->string('image')->nullable();
            $table->boolean('visible');
            $table->string('slug', 50);
            $table->timestamps();

            //DB relations
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beverages');
    }
}
