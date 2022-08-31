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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admission_id')->unsigned();
            $table->foreign('admission_id')->references('id')->on('admissions');
            $table->bigInteger('country_of_birth')->unsigned();
            $table->foreign('country_of_birth')->references('id')->on('countries');
            $table->bigInteger('country_of_living')->unsigned();
            $table->foreign('country_of_living')->references('id')->on('countries');
            $table->enum('gender',['1','2','3']);
            $table->date('dob');
            $table->string('mobile_no');
            $table->string('residential_address');
            $table->string('state');
            $table->string('post_code');
            $table->date('commencement_date');
            $table->enum('is_aus_permanent_resident',['1','2']);
            $table->enum('is_living_in_aus',['1','2']);
            $table->string('visa_type');
            $table->string('passport_number');
            $table->date('passport_expiry_date');
            $table->string('e_contact_name');
            $table->string('relation');
            $table->string('e_contact_no');
            $table->enum('term_and_condition',['1']);
            $table->enum('privacy',['1']);
            $table->string('signature');
            $table->string('image');
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
        Schema::dropIfExists('students');
    }
};
