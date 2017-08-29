<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news__category_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('category_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->text('teaser');

            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('id')->on('news__categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news__category_translations', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('news__category_translations');
    }
}
