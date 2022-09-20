<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_quiz_question_batches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_quiz_batch_id')->unsigned();
            $table->foreign('student_quiz_batch_id')->references('id')->on('student_quiz_batches');
            $table->bigInteger('quiz_question_id')->unsigned();
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions');
            $table->time('start_time');
            $table->softDeletes();
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
        Schema::dropIfExists('student_quiz_question_batches');
    }
};
