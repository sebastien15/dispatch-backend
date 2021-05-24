<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('driver_expiry_date')->nullable();
            $table->integer('booking_expiry_date')->nullable();
            $table->integer('airport_booking_expiry_date')->nullable();
            $table->integer('airport_pickup_charges')->nullable();
            $table->integer('driver_commission_per_booking')->nullable();
            $table->integer('driver_monthly_rent')->nullable();
            $table->boolean('pickup_commission_from_charges')->nullable();
            $table->boolean('no_commission_in_acc_jobs')->nullable();
            $table->boolean('round_mileage_fares')->nullable();
            $table->integer('apply_start_rate_within')->nullable();
            $table->boolean('show_booking_other_charges')->nullable();
            $table->integer('credit_card_extra_charges')->nullable();
            $table->integer('discount_for_return_journey')->nullable();
            $table->integer('discount_for_W_R_journey')->nullable();
            $table->boolean('enable_POI')->nullable();
            $table->boolean('enable_booking_quotation')->nullable();
            $table->boolean('enable_onBoard_driver')->nullable();
            $table->boolean('enable_offPeak_time_fare')->nullable();
            $table->integer('enable_advance_booking_text')->nullable();
            $table->boolean('enable_passenger_text')->nullable();
            $table->boolean('enable_booking_due_alert')->nullable();
            $table->integer('todays_booking')->nullable();
            $table->integer('recent_booking')->nullable();
            $table->integer('paging_size')->nullable();
            $table->integer('grid_row_size')->nullable();
            $table->integer('cash_call_charges')->nullable();
            $table->integer('enable_web_booking')->nullable();
            $table->boolean('web_booking_authorization')->nullable();
            $table->boolean('web_accounts')->nullable();
            $table->boolean('mobile_booking_authorization')->nullable();
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
        Schema::dropIfExists('policies');
    }
}
