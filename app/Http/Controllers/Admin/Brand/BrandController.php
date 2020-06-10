<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Model\Admin\Brand;

class BrandController extends Controller
{
    //add brand

    public function AddBrand(Request $request)
    {
        $strpos = strpos($request->brand_logo,';');
        $sub = substr($request->brand_logo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->brand_logo)->resize(200, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);
        $brand=new Brand();
        $brand->brand_name=$request->brand_name;
     
        $brand->brand_logo = $name;
        $brand->save();
    }
    //all brand
    public function AllBrand()
    {
        $brand=Brand::all();
        return response()->json([
            'brands'=>$brand
        ]);
    }
    //delete brand

    public function DeleteBrand($id)
    {
        $brand=Brand::find($id);
        $image_path=public_path()."/uploadimage/";
        $image= $image_path.$brand->brand_logo;
        if(file_exists($image))
        {
            @unlink($image);
        }
        $brand->delete();
    }
    //edit brand
    public function EditBrand($id)
    {
        $brand=Brand::find($id);
        return response()->json([
            'brands'=>$brand
        ]);
    }
    //update brand
    public function UpdateBrand(Request $request,$id)
    {
        $brand=Brand::find($id);
        if($request->brand_logo!=$brand->brand_logo)
        {
            $strpos = strpos($request->brand_logo,';');
            $sub = substr($request->brand_logo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->brand_logo)->resize(200, 200);
            $upload_path = public_path()."/uploadimage/";
            $image= $upload_path.$brand->brand_logo;
            $img->save($upload_path.$name);
            if(file_exists($image))
            {
                @unlink($image);
            }

        }
        else
        {
            $name=$brand->brand_logo;
        }
        $brand->brand_name=$request->brand_name;
       
        $brand->brand_logo = $name;
        $brand->save();
    }
}
