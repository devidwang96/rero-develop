<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatsMatCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mats__matcategory_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('mat_category_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->text('teaser');

            $table->unique(['mat_category_id', 'locale']);
            $table->foreign('mat_category_id')->references('id')->on('mats__matcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mats__matcategory_translations', function (Blueprint $table) {
            $table->dropForeign(['mat_category_id']);
        });
        Schema::dropIfExists('mats__matcategory_translations');
    }
}
