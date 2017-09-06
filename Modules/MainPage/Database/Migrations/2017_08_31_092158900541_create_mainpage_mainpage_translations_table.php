<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainPageMainpageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainpage__mainpage_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('mainpage_id')->unsigned();
            $table->string('locale')->index();

            $table->unique(['mainpage_id', 'locale']);

            $table->string('title');
            $table->string('meta_keywords');
            $table->string('meta_description');


            $table->string('slogan_string');
            $table->string('welcome_string');
            $table->string('show_menu_string');
            $table->string('our_menu_string');
            $table->string('our_menu_addition_string');
            $table->string('show_full_menu_string');
            $table->string('gallery_title');
            $table->string('leave_feedback_title');
            $table->string('leave_feedback_addition');

            $table->text('copyrights');
            $table->string('addition_content_title');
            $table->text('addition_content');


            $table->foreign('mainpage_id')->references('id')->on('mainpage__mainpages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mainpage__mainpage_translations', function (Blueprint $table) {
            $table->dropForeign(['mainpage_id']);
        });
        Schema::dropIfExists('mainpage__mainpage_translations');
    }
}
