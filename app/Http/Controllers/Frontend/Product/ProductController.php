<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use Image;
use DB;

class ProductController extends Controller
{
    //
    public function Product($id)
    {
        $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*')
        ->where('products.category_id','=',$id)
        ->where('products.status','=','1')
        ->get();
        return response()->json([
            'products'=>$product
        ], 200);
    }
    public function AllProductById($id)
    {
        $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->select('products.*')
        ->where('products.category_id','=',$id)
        ->get();
        return response()->json([
            'products'=>$product
        ], 200);

    }
    
}
