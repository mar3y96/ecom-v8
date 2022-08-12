<?php

use App\Model\Admin\Product;
use Illuminate\Http\Request;

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
// lang
Route::get('lang/{locale}', function ($locale) {
  session()->put('lang', $locale);
  return redirect()->back();
});

Route::get('/', function () {
  $products = Product::where('available_count','>',0)->take(10)->get();
  return view('welcome',compact('products'));
});

Route::get('/product/{product}', function (Product $product) {
  if ($product->available_count > 0) {
    $products = Product::where('category_id',$product->category_id)->where('available_count','>','0')->take(4)->get();
    return view('site.product_details',compact('products','product'));
  }
  abort(404);
})->name('product.details');
// search 
Route::get('/search-resault', function (Request $request) {
    $key = $request->search;
    $products = Product::where('name_en', 'LIKE', "%$key%")->where('available_count','>',0)->orWhere('name_ar', 'LIKE', "%$key%")->orderBy('id')->get();
    return view('site.search-resault',compact('products','key'));
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@index')->name('profile');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

// pages 
Route::view('/about', 'site.about');
Route::view('/contact', 'site.contact');
Route::view('/search', 'site.search');
Route::view('/print', 'site.print');
Route::get('/all-products', function () {
    $products = Product::where('available_count','>',0)->get();
    return view('site.products',compact('products'));
});
Route::get('/products/{category}', function ($category) {
  $products = Product::where('available_count','>',0)->where('category_id',$category)->get();
  return view('site.products',compact('products','category'));
});
//site
Route::group(['namespace' => 'Site'], function () {
  
//cart
  Route::get('/cart', 'CartCtrl@index');
  Route::get('/cart/add/{product}/{total}', 'CartCtrl@add');
  Route::get('/cart/quick-add/{product}', 'CartCtrl@quickAdd');
  Route::get('/cart/action/{rowId}', 'CartCtrl@actions');
  Route::get('/cart/check-out','CartCtrl@checkOut')->middleware('auth');
  Route::get('/cart/get-tax/{city}/{discount?}', 'CartCtrl@tax');
  Route::get('/cart/apply-discount/{code}', 'CartCtrl@applyDiscount');
  //contact
  Route::post('contact/creat-message', 'ContactCtrl@create');
  //pritnt
  Route::post('/print/create-order','PrintCtrl@store');
  // subscribe
  Route::get('/subscripe/store', 'SubscribeCtrl@store');
  Route::get('/subscribe/cancel/{email}', 'SubscribeCtrl@cancel');
 
});
  // user
Route::group(['namespace' => 'User','middleware'=>'auth'], function () {
    //user acount
    Route::put('/user/update', 'AccountCtrl@update');
    // order 
   Route::get('/orders', 'AccountCtrl@orders');
   Route::get('/order-status/{order}', 'AccountCtrl@orderStatus');
   Route::post('order/create/{discount?}','OrderCtrl@create');
   Route::post('order/cancel/{order}','OrderCtrl@cancel');
   // wish list
   Route::get('/wishlist', 'WishlistCtrl@index');
   Route::get('/wishlist/add/{product}', 'WishlistCtrl@add');
   Route::delete('/wishlist/remove/{product}', 'WishlistCtrl@remove');

});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// get avilable number of products
Route::get('/get-available/{product}/{size}', function(Product $product , $size){
  $available =  $product[$size.'_available_count'];
  $html =view('site.elements.available',compact('available'))->render();

  return response(['html'=>$html,'avilabel'=>$available]) ;
});