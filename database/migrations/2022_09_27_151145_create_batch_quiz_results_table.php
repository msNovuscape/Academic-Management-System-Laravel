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
        Schema::create('batch_quiz_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_quiz_batch_id')->unsigned();
            $table->foreign('student_quiz_batch_id')->references('id')->on('student_quiz_batches');
            $table->integer('total_question_attempted');
            $table->float('score');
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
        Schema::dropIfExists('batch_quiz_results');
    }
};
