<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesDishTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes__dish_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('dish_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('short_contain');
            $table->text('full_description');

            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('on_main')->default(0);

            $table->unique(['dish_id', 'locale']);
            $table->foreign('dish_id')->references('id')->on('dishes__dishes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes__dish_translations', function (Blueprint $table) {
            $table->dropForeign(['dish_id']);
        });
        Schema::dropIfExists('dishes__dish_translations');
    }
}
