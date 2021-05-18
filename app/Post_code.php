<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_code extends Model
{
    protected $table = 'post_codes';

    protected $fillable = [
        'post_code','zone_id'
    ];
}
