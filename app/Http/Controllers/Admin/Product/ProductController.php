<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use Image;

class ProductController extends Controller
{
    //add product

    public function AddProduct(Request $request)
    {
        $strpos = strpos($request->product_image,';');
        $sub = substr($request->product_image,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->product_image)->resize(200, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);
        $product=new Product();
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_name=$request->product_name;
        $product->product_code=$request->product_code;
        $product->product_quantity=$request->product_quantity;
        $product->price=$request->price;
        $product->selling_price=$request->selling_price;
        $product->status=$request->status;

        
        $product->product_image = $name;
        //return $product;
        $product->save();

    }
    //all product
    public function AllProduct()
    {
        $product=Product::with('brand','category')->get();
        return response()->json([
            'products'=>$product
        ], 200);
    }
    //delete product
    public function DeleteProduct($id)
    {
        $product=Product::find($id);
        $image_path=public_path()."/uploadimage/";
        $image=$image_path.$product->product_image;
        if(file_exists($image))
        {
            @unlink($image);
        }
        $product->delete();
    }
    //edit product
    public function EditProduct($id)
    {
        $product=Product::find($id);
        return response()->json([
            'products'=>$product
        ]);
    }
    //update product
    public function UpdateProduct(Request $request,$id)
    {
        $product=Product::find($id);
        if($request->product_image!=$product->product_image)
        {
            $strpos=strpos($request->product_image,';');
            $sub=substr($request->product_image,0,$strpos);
            $ex=explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->product_image)->resize(200, 200);
            $upload_path = public_path()."/uploadimage/";
            $image=$upload_path.$product->product_image;
            $img->save($upload_path.$name);
            if(file_exists($image))
            {
                @unlink($image);
            }
        }
        else
        {
            $name=$product->product_image;
        }
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_name=$request->product_name;
        $product->product_code=$request->product_code;
        $product->product_quantity=$request->product_quantity;
        $product->price=$request->price;
        $product->selling_price=$request->selling_price;
        $product->status=$request->status;
        
        
        $product->product_image = $name;
        //return $product;
        $product->save();
        

    }
}
