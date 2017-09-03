<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainPageMainpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainpage__mainpages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->timestamps();

            $table->tinyInteger('menu_button_show')->default(0);
            $table->tinyInteger('dishes_categories_show')->default(0);
            $table->tinyInteger('dishes_menu_show')->default(0);
            $table->tinyInteger('dishes_show')->default(0);
            $table->tinyInteger('gallery_show')->default(0);
            $table->tinyInteger('feedbacks_show')->default(0);
            $table->tinyInteger('addition_content_show')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainpage__mainpages');
    }
}
