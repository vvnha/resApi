<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kindOfFoods', function (Blueprint $table) {
            $table->increments('parentID')->length(13)->unsigned();
            $table->string('name',255);
            $table->string('img',255);
            $table->text('detail')->nullable();
            $table->timestamps();
        });
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('foodID');
            $table->string('foodName',255);
            $table->string('img',255);
            $table->float('price',40);
            $table->float('rating')->nullable();
            $table->integer('hits')->nullable();
            $table->text('ingres')->nullable();
            $table->integer('parentID')->length(13)->unsigned();
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
        Schema::dropIfExists('kindOfFoods');
        Schema::dropIfExists('foods');
    }
}
