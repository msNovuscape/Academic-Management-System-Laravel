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
        Schema::create('transfer_batch_materials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->bigInteger('batch_transfer_id')->unsigned();
            $table->foreign('batch_transfer_id')->references('id')->on('batch_transfers');
            $table->bigInteger('course_module_id')->unsigned();
            $table->foreign('course_module_id')->references('id')->on('course_modules');
            $table->bigInteger('admission_id')->unsigned();
            $table->foreign('admission_id')->references('id')->on('admissions');
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
        Schema::dropIfExists('transfer_batch_materials');
    }
};
