<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/pista/hoy','App\Http\Controllers\FrontendController@pistaHoy');
Route::post('/findpista','App\Http\Controllers\FrontendController@findPista');

Route::group(['prefix'=>'paypal'], function(){
    Route::post('/order/create',[\App\Http\Controllers\PaypalController::class,'create']);
    Route::post('/order/capture/',[\App\Http\Controllers\PaypalController::class,'capture']);
});