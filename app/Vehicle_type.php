<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    protected $fillable = [
        "vehicle_type", 
        "no_of_passenger",
        "no_of_luggage",
        "no_of_hand_luggage",
        "photo","start_rate",
        "no_of_miles_for_start_rate",
        "background","text_color"
    ];
}
