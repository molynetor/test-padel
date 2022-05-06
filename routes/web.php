<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PistaController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartPageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripeController;
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

Route::get('/','App\Http\Controllers\FrontendController@index');
Route::get('/nueva-cita/{pistaId}/{date}/{time}','App\Http\Controllers\FrontendController@show')->name('create.citas');





Route::group(['Middleware'=>['auth','user']],function(){

    Route::get('/perfil','App\Http\Controllers\PerfilController@index');
    Route::post('/perfil/store','App\Http\Controllers\PerfilController@store')->name('perfil.store');
    Route::post('/perfil-foto','App\Http\Controllers\PerfilController@perfilFoto')->name('perfil.foto');

    Route::post('/book/cita','App\Http\Controllers\FrontendController@store')->name('booking.cita');
    Route::get('/myBooking','App\Http\Controllers\FrontendController@myBookings')->name('my.booking');

});

Auth::routes();


Route::get('/welcome', [App\Http\Controllers\HomeController::class,'index'])->name('welcome');



Route::get('/dashboard','App\Http\Controllers\DashboardController@index');

Route::post('/coupon-apply', [FrontendController::class, 'CouponApply']);

Route::post('/cart/data/store',[App\Http\Controllers\CartController::class, 'AddToCart']);
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
Route::get('/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);
Route::get('/mycheckout', [CartController::class, 'CheckoutCreate'])->name('mycheckout');



Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');


Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);


Route::get('/cupones', [App\Http\Controllers\PruebaController::class,'index'])->name('cupones');
Route::post('/store', [App\Http\Controllers\PruebaController::class,'store'])->name('cupon.store');
Route::get('/edit/{id}',[App\Http\Controllers\PruebaController::class,'edit'])->name('cupon.edit');
Route::post('/update/{id}',[App\Http\Controllers\PruebaController::class,'update'])->name('cupon.update');
Route::get('/delete/{id}',[App\Http\Controllers\PruebaController::class,'delete'])->name('cupon.delete');




Route::group(['Middleware'=>['auth','admin']],function(){
    
    Route::resource('pistas',App\Http\Controllers\PistaController::class);

    Route::resource('citas',App\Http\Controllers\CitasController::class);
    Route::post('/citas/check','App\Http\Controllers\CitasController@check')->name('citas.check');
    Route::post('/citas/update','App\Http\Controllers\CitasController@updateTime')->name('update');
    Route::post('/citas/show','App\Http\Controllers\CitasController@todas')->name('todas');

    Route::get('/usuarios','App\Http\Controllers\UserListController@index')->name('usuarios');
    Route::get('/usuarios/all','App\Http\Controllers\UserListController@allReservas')->name('all.reservas');
    Route::get('/status/update/{id}','App\Http\Controllers\UserListController@toggleStatus')->name('update.status');
});



    
    
 