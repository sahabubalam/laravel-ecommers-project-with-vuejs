<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Frontend\Customer;
use App\Model\Frontend\Shipping;
use DB;
use Session;
use Cart;

class CustomerController extends Controller
{
    //customer registration

    public function CustomerRegistration(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|min:12|max:50',
            'name'=>'required|min:3|max:50',
            'address'=>'required|min:12|max:50',
            'phone'=>'required|min:9|max:15',
            'postcode'=>'required|min:4|max:12'

        ]);
        $customer=new Customer();
        $customer->email=$request->email;
        $customer->name=$request->name;
        $customer->address=$request->address;
        $customer->phone=$request->phone;
        $customer->postcode=$request->postcode;
        $customer->password=bcrypt($request->password);
        $customer->save();

        Session::put(['customer_id'=>$customer->id]);

        Session::put(['customer_name'=>$customer->name]);
       
       

    }
    public function SaveShipping(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|min:12|max:50',
            'name'=>'required|min:3|max:50',
            'address'=>'required|min:12|max:50',
            'phone'=>'required|min:9|max:15',
            'postcode'=>'required|min:4|max:12'

        ]);
        $user=new Shipping();
        $user->email=$request->email;
        $user->name=$request->name;
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->postcode=$request->postcode;
        $user->save();
        Session::put(['shipping_id'=>$user->id]);
       
    }
    public function ShippingInfo()
    {
        $customer=Customer::find(Session::get('customer_id'));
        return response()->json([
            'customer'=>$customer
        ]);
    }
    public function CustomerLogout()
    {
        $logout=session()->forget(['customer_id','customer_name','shipping_id']);
        return response()->json([
            'logout'=>$logout
        ]);
        
    }
    public function CustomerLogin(Request $request)
    {
        //return $request->email;
        $customer= Customer::where('email',$request->email)->first();
        if(Customer::where('email',$request->email)->first())
        {
            if(password_verify($request->password,$customer->password))
            {
                
                Session::put(['customer_id'=>$customer->id]);
                Session::put(['customer_name'=>$customer->name]);
            }
            else
            {
                
            }
        }
        else
        {
            
        }
    }
}
