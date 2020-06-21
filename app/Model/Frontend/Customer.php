<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'email','name','address','phone','postcode','password',
    ];
}
