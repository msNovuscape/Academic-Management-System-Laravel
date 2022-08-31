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
        Schema::create('batch_course_materials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->bigInteger('course_material_id')->unsigned();
            $table->foreign('course_material_id')->references('id')->on('course_materials');
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
        Schema::dropIfExists('batch_course_materials');
    }
};
