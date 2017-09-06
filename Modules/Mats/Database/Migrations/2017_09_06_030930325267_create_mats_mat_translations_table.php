<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatsMatTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mats__mat_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('mat_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('teaser');
            $table->text('full_description');


            $table->unique(['mat_id', 'locale']);
            $table->foreign('mat_id')->references('id')->on('mats__mats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mats__mat_translations', function (Blueprint $table) {
            $table->dropForeign(['mat_id']);
        });
        Schema::dropIfExists('mats__mat_translations');
    }
}
