<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
        'loc_name','loc_type', 'address', 'zone_id', 'post_code', 'extra_charges'
    ];
}
