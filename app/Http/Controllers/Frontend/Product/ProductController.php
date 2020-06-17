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
    public function Product()
    {
        $product=DB::table('products')
       
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
    public function ProductDetailsById($id)
    {
        $product=Product::with('category')->where('id',$id)->first();
        return response()->json([
            'products'=>$product
        ], 200);
    }
    
}
