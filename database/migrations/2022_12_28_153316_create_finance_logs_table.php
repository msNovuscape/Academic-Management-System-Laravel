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
        Schema::create('finance_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('finance_id')->unsigned();
            $table->foreign('finance_id')->references('id')->on('finances');
            $table->bigInteger('admission_id')->unsigned();
            $table->foreign('admission_id')->references('id')->on('admissions');
            $table->bigInteger('batch_installment_id')->unsigned();
            $table->foreign('batch_installment_id')->references('id')->on('batch_installments');
            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->float('amount');
            $table->date('created_date');
            $table->date('updated_date');
            $table->string('transaction_no')->nullable();
            $table->enum('status',['1','2']); //1 for paid 2 for unpaid
            $table->enum('bank_status',['1','2']); //1 for verified 2 for unverified
            $table->enum('extend_status',['1','2'])->default('1'); //1 for not extend 2 for extend
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('finance_logs');
    }
};
