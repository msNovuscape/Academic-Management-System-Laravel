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
        Schema::create('extend_dates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admission_id')->unsigned();
            $table->foreign('admission_id')->references('id')->on('admissions');
            $table->bigInteger('batch_installment_id')->unsigned();
            $table->foreign('batch_installment_id')->references('id')->on('batch_installments');
            $table->bigInteger('finance_id')->unsigned();
            $table->foreign('finance_id')->references('id')->on('finances');
            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->date('due_date');
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
        Schema::dropIfExists('extend_dates');
    }
};
