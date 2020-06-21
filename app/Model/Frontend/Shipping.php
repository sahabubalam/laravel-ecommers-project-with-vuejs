<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'email','name','phone','address','postcode',
    ];
}