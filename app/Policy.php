<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable= [
        'driver_expiry_date','booking_expiry_date',
        'airport_booking_expiry_date','airport_pickup_charges',
        'driver_commission_per_booking','driver_monthly_rent',
        'pickup_commission_from_charges','no_commission_in_acc_jobs',
        'round_mileage_fares','apply_start_rate_within',
        'show_booking_other_charges','credit_card_extra_charges',
        'discount_for_return_journey','discount_for_W_R_journey',
        'enable_POI','enable_booking_quotation','enable_onBoard_driver',
        'enable_offPeak_time_fare','enable_advance_booking_text',
        'enable_passenger_text','enable_booking_due_alert','todays_booking',
        'recent_booking','paging_size','grid_row_size','cash_call_charges',
        'enable_web_booking','web_booking_authorization','web_accounts',
        'mobile_booking_authorization'
    ];
}
