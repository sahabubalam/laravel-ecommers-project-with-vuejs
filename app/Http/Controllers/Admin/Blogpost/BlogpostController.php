<?php

namespace App\Http\Controllers\Admin\Blogpost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Blogpost;
use Image;

class BlogpostController extends Controller
{
    //add blogpost
    public function AddBlogpost(Request $request)
    {
        $strpos=strpos($request->image,';');
        $sub = substr($request->image,0,$strpos);
        $ex=explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->image)->resize(200, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);
        $blogpost=new Blogpost();
        $blogpost->category_id=$request->category_id;
        $blogpost->post_title_eng=$request->post_title_eng;
        $blogpost->post_title_bng=$request->post_title_bng;
        $blogpost->post_description_eng=$request->post_description_eng;
        $blogpost->post_description_bng=$request->post_description_bng;
        $blogpost->image = $name;
        //return $product;
        $blogpost->save();


    }
    //all blogpost

    public function AllBlogpost()
    {
        $blogpost=Blogpost::all();
        return response()->json([
            'blogposts'=>$blogpost
        ]);
    }
    //delete blogpost
    public function DeleteBlogpost($id)
    {
        $blogpost=Blogpost::find($id);
        $image_path=public_path()."/uploadimage/";
        $img=$image_path.$blogpost->image;
        if(file($img))
        {
            @unlink($img);
        }
        $blogpost->delete();

    }
    //edit blogpost
    public function EditBlogpost($id)
    {
        $blogpost=Blogpost::find($id);
        return response()->json([
            'blogposts'=>$blogpost
        ]);
    }
    //update blogpost

    public function UpdateBlogpost(Request $request,$id)
    {
        $blogpost=Blogpost::find($id);
        if($request->image!=$blogpost->image)
        {
            $strpos=strpos($request->image,';');
            $sub=substr($request->image,0,$strpos);
            $ex=explode('/',$sub)[1];
            $name=time().".".$ex;
            $img = Image::make($request->image)->resize(200, 200);
            $upload_path=public_path()."/uploadimage/";
            $image=$upload_path.$blogpost->image;
            $img->save($upload_path.$name);
            if(file_exists($image))
            {
                @unlink($image);
            }
            else
            {
                $name=$blogpost->image;
            }
            $blogpost->category_id=$request->category_id;
            $blogpost->post_title_eng=$request->post_title_eng;
            $blogpost->post_title_bng=$request->post_title_bng;
            $blogpost->post_description_eng=$request->post_description_eng;
            $blogpost->post_description_bng=$request->post_description_bng;
            $blogpost->image = $name;
            $blogpost->save();
        }
    }
}
