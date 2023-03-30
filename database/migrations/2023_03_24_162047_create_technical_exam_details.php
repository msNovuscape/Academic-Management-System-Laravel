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
        Schema::create('technical_exam_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('technical_exam_id')->unsigned();
            $table->foreign('technical_exam_id')->references('id')->on('technical_exams')->onUpdate('cascade');
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade');
            $table->bigInteger('technical_exam_timeslot_id')->unsigned();
            $table->foreign('technical_exam_timeslot_id')->references('id')->on('technical_exam_timeslots')->onUpdate('cascade');
            $table->string('capacity')->nullable();
            $table->enum('status', ['1', '2'])->default(1);
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
        Schema::dropIfExists('technical_exam_details');
    }
};
