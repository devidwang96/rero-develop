<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesDishCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes__dishcategory_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('dish_category_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->text('teaser');

            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('on_main')->default(0);

            $table->unique(['dish_category_id', 'locale']);
            $table->foreign('dish_category_id')->references('id')->on('dishes__dishcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes__dishcategory_translations', function (Blueprint $table) {
            $table->dropForeign(['dish_category_id']);
        });
        Schema::dropIfExists('dishes__dishcategory_translations');
    }
}
