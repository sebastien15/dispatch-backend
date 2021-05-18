<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver_availability extends Model
{
    protected $table = 'driver_availabilities';

    protected $fillable = [
        'driver_id','become_available', 'ending_time'
    ];

}
