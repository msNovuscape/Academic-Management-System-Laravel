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
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quiz_id')->unsigned();
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->enum('question_type',['1','2']); //1 for text, 2 for image
            $table->longText('question')->nullable();
            $table->integer('no_of_option');
            $table->enum('status',['1','2']); //1 for Active, 2 for deactive
            $table->integer('weight')->default(1);
            $table->longText('answer_explanation')->nullable();
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
        Schema::dropIfExists('quiz_questions');
    }
};
