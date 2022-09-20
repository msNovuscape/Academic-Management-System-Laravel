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
        Schema::create('student_quiz_question_individual_answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('s_q_q_i_id')->unsigned();
            $table->foreign('s_q_q_i_id')->references('id')->on('student_quiz_question_individuals');
            $table->bigInteger('quiz_option_id')->unsigned();
            $table->foreign('quiz_option_id')->references('id')->on('quiz_options');
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
        Schema::dropIfExists('student_quiz_question_individual_answers');
    }
};
