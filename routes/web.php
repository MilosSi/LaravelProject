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

Route::get('/',"HomeController@index");
Route::get('/aboutus',"PageController@aboutus" );
Route::get('/contactus',"PageController@contactus" );
Route::get('/author',"PageController@author" );
Route::post('/contactmessage',"PageController@message" );
Route::get('/wishlist',"PageController@wishlist" );
Route::get('/cart',"PageController@cart" );
Route::get('/myaccount',"MyAccountController@index" )->middleware(['IsLoggedIn']);
Route::post('/editmyaccount',"MyAccountController@editmyaccount" )->middleware(['IsLoggedIn']);
Route::post('/addaddress',"MyAccountController@store" )->middleware(['IsLoggedIn']);
Route::post('/editaddress',"MyAccountController@edit" )->middleware(['IsLoggedIn']);

Route::get('/ourteam',"Ourteamcontroller@index" );

Route::get('/allproducts',"AllProductsController@index" );

Route::get('/shop/{id}','ShopControler@index');

Route::get('/product/{id}','ProductController@index');

Route::get('/checkout',"CheckoutController@index");

Route::get("/collections/{id}",'CollectionsController@index');

//Registracija Login
Route::get('/loginregister','AuthController@index');
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');
Route::get('/logout','AuthController@logout')->middleware(['IsLoggedIn']);;

//Search
Route::post('/search','SearchController@index');

//AJAX
Route::post("/ajaxquickview","AjaxController@quickview");
Route::post("/ajaxcategory","AjaxController@category");
Route::post("/ajaxwishlist","AjaxController@wishlist");
Route::post("/ajaxfilter","AjaxController@productsfilter");
Route::get("/editaddress","MyAccountController@show")->middleware(['IsLoggedIn']);;


//Orders
Route::post('/placeorder',"CheckoutController@store");

//Forme
Route::post('/newsletter',"NewsletterController@store");


//ADMIN
Route::prefix("/admin")->middleware(["IsLoggedIn", "admin"])-> group(function(){
    Route::get('/home','Admin\AdminHomeControler@index');
    Route::resource('/collections','Admin\CollectionController');
    Route::resource('/tags','Admin\TagsController');
    Route::resource('/categories','Admin\CategoriesController');
    Route::resource('/orders','Admin\OrdersController');
    Route::resource('/products','Admin\ProductsController');
    Route::resource('/newsletter','Admin\NewsletterController');
    Route::post('/products/addpicture','Admin\ProductsController@addmorepictures');
    Route::post('/products/special/edit','Admin\ProductsController@specialproducts');
    Route::post('/newsletter/message','Admin\NewsletterController@message');

    //AJAX
    Route::post("/ajaxaddtocollection","AjaxController@addtocollection");
    Route::post("/ajaxremovefromcol","AjaxController@removefromcollection");
    Route::post("/ajaxshowcategories","AjaxController@ajaxshowcategories");
    Route::post("/ajaxaddcattogender","AjaxController@ajaxaddcattogender");
    Route::post("/ajaxremovecategorygender","AjaxController@ajaxremovecategorygender");
    Route::post("/ajaxstatusorder","AjaxController@ajaxstatusorder");
    Route::post("/ajaxchangeprice","AjaxController@ajaxchangeprice");
    Route::post("/ajaxchangemainpic","AjaxController@ajaxchangemainpic");
    Route::post("/ajaxremoveimage","AjaxController@ajaxremoveimage");

    Route::post("/ajaxaddtags","AjaxController@ajaxaddtags");
    Route::post("/ajaxremovefromtag","AjaxController@ajaxremovefromtag");
});


