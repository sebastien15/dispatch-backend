<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('assigned_on');
            $table->dateTime('end_one');
            // make the below lign a foreign key to vehicle type after creating vehicle type table
            $table->string('vehicle_type');
            $table->string('color');
            $table->string('vehicle_make');
            $table->string('vehicle_no');
            $table->string('vehicle_owner');
            $table->string('vehicle_model');
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
        Schema::dropIfExists('vehicle_assignments');
    }
}
