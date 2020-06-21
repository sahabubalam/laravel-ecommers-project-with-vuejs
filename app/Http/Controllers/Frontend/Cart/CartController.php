<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Frontend\Customer;
use DB;
use Cart;
use Session;

class CartController extends Controller
{
    
    //cart

    public function AddToCart(request $request,$id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        // return Product::find($request->id);
        $data=array();
        $data['id']=$product->id;
        $data['name']=$product->product_name;
        $data['qty']=$request->product_quantity;
        $data['price']=$product->price;
        $data['weight']=1;
        $data['options']['image']=$product->product_image;
        //return response()->json($data);
        Cart::add($data);
    }
    public function CartList()
    {
        $content=Cart::content();
        return response()->json([
            'content'=>$content
        ]);

    }
    public function EditCart()
    {
        $content=Cart::content();
        return response()->json([
            'content'=>$content
        ]);
    }
    public function Payment()
    {
        
    }
}
