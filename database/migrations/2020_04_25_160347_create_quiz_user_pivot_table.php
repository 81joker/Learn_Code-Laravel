<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_user', function (Blueprint $table) {
           $table->unsignedBigInteger('user_id');
           $table->unsignedBigInteger('quiz_id');

           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('quiz_id')->references('id')->on('quizzes');

           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_user');
    }
}
