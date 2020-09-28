<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_user', function (Blueprint $table) {
            $table->id();
            $table->text('answer');
            $table->integer('mark');
            $table->string('status');
            //foreign key in questions table
            $table->unsignedBigInteger('short_question_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('short_question_id')
                  ->references('id')
                  ->on('short_questions')
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
        Schema::dropIfExists('short_user');
    }
}
