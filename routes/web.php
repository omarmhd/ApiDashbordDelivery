<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DriverOrderRequestController;
use App\Http\Controllers\OrderMealDetailsController;
use App\Http\Controllers\SettingsController;

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


Route::get('/saas', function () {
    return view('test');
});

// Route::get('/order/all', [OrderController::class, 'all'])->name('order.all');
// Route::get('/coupon/all', [CouponController::class, 'all'])->name('coupon.all');

Route::resource('/user', UserController::class);
Route::resource('/restaurant', RestaurantController::class);
Route::resource('/meal', \App\Http\Controllers\MealController::class);
Route::resource('/extra', \App\Http\Controllers\ExtrasController::class);
Route::resource('/order', OrderController::class);
// Route::resource('/order/meal-details', OrderMealDetails::class);
Route::resource('/coupon', CouponController::class);
Route::resource('/message', \App\Http\Controllers\MessageController::class);


Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

Route::get('/attachment/{image}',function ($image){
    $attachment=\App\Models\Attachment::where('name','=',$image)->first();
    $path=public_path('images').'/'.$attachment->name;

if(File::exists($path)){
    File::delete($path);
    $attachment->delete();
    return redirect()->back()->with('success','تم حذف الصور بنجاح');
}else{
    return redirect()->back()->with('error','الصورة غير موجودة');
}



})->name('attachment.destroy');


Route::get('/dataTable', [UserController::class, 'dataTable'])->name('dataTable.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
