<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';

    protected $fillable = [
        'driver_no','pda_pass', 'has_pda', 'rent_paid', 'active', 'pda_mobile_no', 'driver_name', 
        'email', 'tel_no', 'address', 'dob', 'mobile_no', 'ni', 'driver_type', 'driver_monthly_rent', 'photo'
    ];

}
