<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageSetsSetsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagesets__sets_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Home
            $table->string('home_title');
            $table->text('home_meta_keywords');
            $table->text('home_meta_description');
            $table->string('home_add_content_title');
            $table->text('home_add_content');

            // News
            $table->string('news_title');
            $table->text('news_meta_keywords');
            $table->text('news_meta_description');

            // Menu
            $table->string('menu_title');
            $table->text('menu_meta_keywords');
            $table->text('menu_meta_description');

            // Events
            $table->string('events_title');
            $table->text('events_meta_keywords');
            $table->text('events_meta_description');

            // Collective
            $table->string('collective_title');
            $table->text('collective_meta_keywords');
            $table->text('collective_meta_description');

            // gallery
            $table->string('gallery_title');
            $table->text('gallery_meta_keywords');
            $table->text('gallery_meta_description');

            $table->integer('sets_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['sets_id', 'locale']);
            $table->foreign('sets_id')->references('id')->on('pagesets__sets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagesets__sets_translations', function (Blueprint $table) {
            $table->dropForeign(['sets_id']);
        });
        Schema::dropIfExists('pagesets__sets_translations');
    }
}
