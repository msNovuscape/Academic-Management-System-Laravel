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
        Schema::create('student_quiz_batches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quiz_batch_id')->unsigned();
            $table->foreign('quiz_batch_id')->references('id')->on('quiz_batches');
            $table->bigInteger('admission_id')->unsigned();
            $table->foreign('admission_id')->references('id')->on('admissions');
            $table->date('date');
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
        Schema::dropIfExists('student_quiz_batches');
    }
};
