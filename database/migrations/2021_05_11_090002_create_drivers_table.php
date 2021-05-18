<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('driver_no');
            $table->string('pda_pass');
            $table->string('has_pda');
            $table->boolean('rent_paid');
            $table->boolean('active');
            $table->string('pda_mobile_no');
            $table->string('driver_name');
            $table->string('email');
            $table->string('tel_no');
            $table->string('address');
            $table->dateTime('dob');
            $table->string('mobile_no');
            $table->string('ni');
            $table->string('driver_type');
            $table->string('driver_monthly_rent');
            $table->string('photo');
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
        Schema::dropIfExists('drivers');
    }
}
