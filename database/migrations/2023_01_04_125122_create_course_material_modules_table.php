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
        Schema::create('course_material_modules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_material_id')->unsigned();
            $table->foreign('course_material_id')->references('id')->on('course_materials');
            $table->bigInteger('course_module_id')->unsigned();
            $table->foreign('course_module_id')->references('id')->on('course_modules');
            $table->enum('status', ['1', '2'])->default('1');
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
        Schema::dropIfExists('course_material_modules');
    }
};
