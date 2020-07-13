<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('react',['like','dislike']);

            // relarion with user
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            // relarion with section
            // relarion with user
            $table->unsignedBigInteger('experience_id');
            $table->foreign('experience_id')->references('id')->on('experiences')
            ->onDelete('cascade')->onUpdate('cascade');
            // relarion with section

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
        Schema::dropIfExists('reacts');
    }
}
