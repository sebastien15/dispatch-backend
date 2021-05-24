<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_info extends Model
{
    protected $fillable = [
        'name','tel_no','emergency_contact',
        'email','fax','website','address','bg_color',
        'map_icon','photo','sort_code','acc_no','bank','company_nbr',
        'VAT_nbr','IBAN','BLC'
    ];
}
