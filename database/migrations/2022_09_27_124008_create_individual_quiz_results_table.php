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
        Schema::create('individual_quiz_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('s_q_individual_id')->unsigned();
            $table->foreign('s_q_individual_id')->references('id')->on('student_quiz_individuals');
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
        Schema::dropIfExists('individual_quiz_results');
    }
};
