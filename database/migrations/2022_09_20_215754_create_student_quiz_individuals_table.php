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
        Schema::create('student_quiz_individuals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quiz_indiviual_id')->unsigned();
            $table->foreign('quiz_indiviual_id')->references('id')->on('quiz_indiviuals');
            $table->bigInteger('admission_id')->unsigned();
            $table->foreign('admission_id')->references('id')->on('admissions');
            $table->date('date');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->enum('status',['0','1','2'])->default('0'); // 0 for not started, 1 for completed and 2 for started
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
        Schema::dropIfExists('student_quiz_individuals');
    }
};
