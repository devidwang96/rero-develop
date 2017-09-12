<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageSetsSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagesets__sets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Home
            $table->tinyInteger('home_menu_button_show')->default(0);
            $table->tinyInteger('home_dishes_categories_show')->default(0);
            $table->tinyInteger('home_dishes_menu_show')->default(0);
            $table->tinyInteger('home_dishes_show')->default(0);
            $table->tinyInteger('home_gallery_show')->default(0);
            $table->tinyInteger('home_feedbacks_show')->default(0);
            $table->tinyInteger('home_addition_content_show')->default(0);


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
        Schema::dropIfExists('pagesets__sets');
    }
}
