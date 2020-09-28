<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrueUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('true_user', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('answer');
            $table->integer('mark');
            //foreign key in questions table
            $table->unsignedBigInteger('true_false_question_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('true_false_question_id')
                  ->references('id')
                  ->on('true_false_questions')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('true_user');
    }
}
