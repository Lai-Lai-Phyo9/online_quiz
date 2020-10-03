<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMulti UserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_user', function (Blueprint $table) {
            $table->id();
            
            $table->tinyInteger('answer');
            $table->integer('mark');

            //foreign key in questions table
            $table->unsignedBigInteger('multi_question_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('multi_question_id')
                  ->references('id')
                  ->on('multi_questions')
                  ->onDelete('cascade');
            //foreign key in users table
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
        Schema::dropIfExists('multi_user');
    }
}
