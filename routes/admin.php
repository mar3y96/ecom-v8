<?php

use App\Model\Site\Order;

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

//products 
Route::resource('products','ProductCtrl');
Route::get('products/best-offer/{product}','ProductCtrl@bestOffer');
Route::get('/products/{product}/images', 'ProductCtrl@images')->name('products.images');
Route::post('/products/images/{product}', 'ProductCtrl@storeImages');
Route::delete('product/image/delete/{image}','ProductCtrl@deleteImages')->name('products.images.destroy');
// settings
Route::view('/settings', 'admin.settings.settings');
Route::put('/settings', 'SettingCtrl@saveSettings')->name('settings.update');
//end settins

// print 
Route::get('/print-images', 'PrintCtrl@images');
Route::delete('print-images/image/delete/{image}','PrintCtrl@deleteImage')->name('print.images.destroy');
Route::post('/print-images/store', 'PrintCtrl@storeImages');


Route::get('/print-orders', 'PrintCtrl@index');
Route::get('/print-orders/{order}/show', 'PrintCtrl@show')->name('print.show');
Route::delete('/print-orders/{order}/delete', 'PrintCtrl@delete')->name('print.destroy');

//orders
Route::get('/orders', 'OrderCtrl@index');
Route::get('/orders/{status}', 'OrderCtrl@status');
Route::get('/orders/{order}/show', 'OrderCtrl@show')->name('order.show');
Route::delete('/orders/{order}/delete', 'OrderCtrl@delete')->name('order.destroy');
Route::put('/orders/{order}/update', 'OrderCtrl@update')->name('order.update');
Route::get('/all-orders/print',function(){
    $orders = Order::all();
    return view('admin.orders.print',compact('orders'));
});
Route::get('/orders/{order}/print',function(Order $order){
    return view('admin.orders.print',compact('order'));
});

// messages
Route::get('/contacts', 'ContactCtrl@index');
Route::get('/contacts/{message}', 'ContactCtrl@Show');
Route::delete('/contacts/{message}/delete', 'ContactCtrl@delete')->name('contact.destroy');
// users
Route::get('/users', 'UserCtrl@index');
Route::get('/users/{user}', 'UserCtrl@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserCtrl@edit')->name('users.edit');
Route::put('/users/{user}', 'UserCtrl@update')->name('users.update');
Route::delete('/users/{user}', 'UserCtrl@destroy')->name('users.destroy');

// profile
Route::get('profile', 'AdminCtrl@profile');
Route::put('profile', 'AdminCtrl@updateProfile')->name('profile.update');
// admin
Route::resource('admins','AdminCtrl');
// codes
Route::get('discount-codes', 'DiscountCtrl@index');
Route::post('discount-codes', 'DiscountCtrl@store');
Route::get('/discount-codes/{code}/edit', 'DiscountCtrl@edit')->name('discountCode.edit');
Route::put('/discount-codes/{code}/update', 'DiscountCtrl@update')->name('discountCode.update');
// Notification
Route::get('showNotification/{id}','AdminNotificationCtrl@show');

// tax
Route::get('tax', 'TaxCtrl@index');
Route::post('tax', 'TaxCtrl@store');
Route::get('/tax/{tax}/edit', 'TaxCtrl@edit')->name('tax.edit');
Route::put('/tax/{tax}/update', 'TaxCtrl@update')->name('tax.update');
