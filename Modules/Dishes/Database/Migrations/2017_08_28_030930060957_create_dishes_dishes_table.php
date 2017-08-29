<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes__dishes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('category_id');
            $table->integer('price');

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
        Schema::dropIfExists('dishes__dishes');
    }
}
