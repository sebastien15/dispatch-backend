<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_gateway extends Model
{
    protected $fillable =[
        'gateway','merchant_id','password','gateway_id'
    ];
}
