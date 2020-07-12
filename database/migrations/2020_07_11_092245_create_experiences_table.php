<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('img');
            $table->longText('content');
            // relarion with user
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            // relarion with section
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->tinyInteger('approved')->default(0);
            $table->tinyInteger('anonymous')->default(0); // post as a anonymous

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
        Schema::dropIfExists('experiences');
    }
}
