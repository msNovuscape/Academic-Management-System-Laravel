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
        Schema::create('timeslot_technical_exam', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('technical_exam_id')->unsigned();
            $table->foreign('technical_exam_id')->references('id')->on('technical_exams')->onUpdate('cascade');
            $table->bigInteger('technical_exam_timeslot_id')->unsigned();
            $table->foreign('technical_exam_timeslot_id')->references('id')->on('technical_exam_timeslots')->onUpdate('cascade');
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
        Schema::dropIfExists('timeslot_technical_exam');
    }
};
