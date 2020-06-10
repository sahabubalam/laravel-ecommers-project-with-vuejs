<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','subcategory_id','brand_id','product_name','product_image','product_code','product_quantity','price','selling_price','status',
    ];
    public function brand()
    {
        return $this->belongsTo('App\Model\Admin\Brand','brand_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Model\Admin\Category','category_id');
    }
}
