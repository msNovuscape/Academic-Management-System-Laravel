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
        Schema::create('user_teacher_batches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('user_teacher_id')->unsigned();
            $table->foreign('user_teacher_id')->references('id')->on('user_teachers');
            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->bigInteger('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->enum('status', [1,2])->default(1);
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
        Schema::dropIfExists('user_teacher_batches');
    }
};
