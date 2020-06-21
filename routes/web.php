<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//category
Route::post('/add-category','Admin\Category\CategoryController@AddCategory');
Route::get('/category','Admin\Category\CategoryController@AllCategory');
Route::get('/category/{id}','Admin\Category\CategoryController@DeleteCategory');
Route::get('/editcategory/{id}','Admin\Category\CategoryController@EditCategory');
Route::post('/update-category/{id}','Admin\Category\CategoryController@UpdateCategory');

//brand
Route::post('/add-brand','Admin\Brand\BrandController@AddBrand');
Route::get('/brand','Admin\Brand\BrandController@AllBrand');
Route::get('/delete-brand/{id}','Admin\Brand\BrandController@DeleteBrand');
Route::get('/edit-brand/{id}','Admin\Brand\BrandController@EditBrand');
Route::post('/update-brand/{id}','Admin\Brand\BrandController@UpdateBrand');

//product
Route::post('/add-product','Admin\Product\ProductController@AddProduct');
Route::get('/product','Admin\Product\ProductController@AllProduct');
Route::get('/delete-product/{id}','Admin\Product\ProductController@DeleteProduct');
Route::get('/edit-product/{id}','Admin\Product\ProductController@EditProduct');
Route::post('/update-product/{id}','Admin\Product\ProductController@UpdateProduct');

//blogpost
Route::post('/add-blogpost','Admin\Blogpost\BlogpostController@AddBlogpost');
Route::get('/blogpost','Admin\Blogpost\BlogpostController@AllBlogpost');
Route::get('/delete-blogpost/{id}','Admin\Blogpost\BlogpostController@DeleteBlogpost');
Route::get('/edit-blogpost/{id}','Admin\Blogpost\BlogpostController@EditBlogpost');
Route::post('/update-blogpost/{id}','Admin\Blogpost\BlogpostController@UpdateBlogpost');

//frontend
Route::get('/productbystatus','Frontend\Product\ProductController@Product');
Route::get('/productbyid/{id}','Frontend\Product\ProductController@AllProductById');
Route::get('/product-details/{id}','Frontend\Product\ProductController@ProductDetailsById');

//cart
Route::post('/add-cart/{id}','Frontend\Cart\CartController@AddToCart');
Route::get('/cart-list','Frontend\Cart\CartController@CartList');

//customer registration
Route::post('/customer-registration','Frontend\Customer\CustomerController@CustomerRegistration');
Route::post('/login-customer','Frontend\Customer\CustomerController@CustomerLogin');
Route::get('/logout','Frontend\Customer\CustomerController@CustomerLogout');
Route::get('/shipping-info','Frontend\Customer\CustomerController@ShippingInfo');
Route::post('/customer-shipping','Frontend\Customer\CustomerController@SaveShipping');

Route::post('/shipping-cart','Frontend\Cart\CartController@Payment');





