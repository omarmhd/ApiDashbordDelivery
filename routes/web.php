<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;

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
    return view('dashboard.users.index');
});
Route::get('/saas', function () {
    return view('test');
});
Route::get('/order/all', [OrderController::class, 'all'])->name('order.all');
Route::get('/coupon/all', [CouponController::class, 'all'])->name('coupon.all');


Route::resource('/user', UserController::class);
Route::resource('/restaurant', RestaurantController::class);
Route::resource('/meal', \App\Http\Controllers\MealController::class);
Route::resource('/extra', \App\Http\Controllers\ExtrasController::class);
Route::resource('/order', OrderController::class);
Route::resource('/coupon', CouponController::class);

Route::get('/dataTable', [UserController::class, 'dataTable'])->name('dataTable.index');
