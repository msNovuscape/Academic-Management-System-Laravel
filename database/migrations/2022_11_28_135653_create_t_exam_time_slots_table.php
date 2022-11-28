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
        Schema::create('t_exam_time_slots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('technical_exam_id')->unsigned();
            $table->foreign('technical_exam_id')->references('id')->on('technical_exams');
            $table->time('start_time');
            $table->time('end_time');
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
        Schema::dropIfExists('t_exam_time_slots');
    }
};
