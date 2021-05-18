<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_assignment extends Model
{
    protected $table = 'vehicle_assignments';

    protected $fillable = [
        'vehicle_type','color', 'vehicle_make', 'vehicle_no', 'vehicle_owner', 'vehicle_model'
    ];
}
