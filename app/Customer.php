<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','email','tel_no','blacklist','mobile_no','fax','door_no','address1','address2'
    ];
}
