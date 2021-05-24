<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    protected $table = 'zones';

    protected $fillable = [
        'zone_name'
    ];
}
