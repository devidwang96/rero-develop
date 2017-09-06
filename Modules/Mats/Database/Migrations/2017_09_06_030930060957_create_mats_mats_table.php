<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatsMatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mats__mats', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('mat_type')->default(0);

            $table->integer('category_id');

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
        Schema::dropIfExists('mats__mats');
    }
}
