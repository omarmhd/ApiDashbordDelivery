<?php

use App\Http\Controllers\ConstantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DriverOrderRequestController;
use App\Http\Controllers\OrderMealDetailsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SliderController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

// Route::get('/order/all', [OrderController::class, 'all'])->name('order.all');
// Route::get('/coupon/all', [CouponController::class, 'all'])->name('coupon.all');
Route::group(['middleware' => "auth"], function () {


    Route::get('/', function () {

        $orders = \App\Models\Order::count();
        $client = \App\Models\Role::where('name', 'client')->first();
        $client = $client->users->count();
        $driver = \App\Models\Role::where('name', 'driver')->first();
        $driver = $driver->users->count();

        $messages = \App\Models\Message::latest()->take(4)->get();
        $resturants = \App\Models\Restaurant::count();

        $users = \App\Models\User::count();

        return view('dashboard.dash', ['orders' => $orders, 'clients' => $client, 'drivers' => $driver, 'users' => $users, 'messages' => $messages, 'resturants' => $resturants]);
    })->name('dashboard.index');


    Route::resource('/user', UserController::class);
    Route::resource('/driver', DriverController::class);
    Route::resource('/restaurant', RestaurantController::class);
    Route::resource('/meal', \App\Http\Controllers\MealController::class);
    Route::resource('/extra', \App\Http\Controllers\ExtrasController::class);
    Route::resource('/order', OrderController::class);
    Route::resource('/category', \App\Http\Controllers\CategoryController::class);
    Route::resource('/coupon', CouponController::class);
    Route::resource('/message', \App\Http\Controllers\MessageController::class);
    Route::resource('/slider', SliderController::class);


    Route::get('/constants/{key}', [ConstantController::class,'index'])->name('constants.index');
    Route::get('/constants/{key}/datatable', [ConstantController::class,'datatable'])->name('constants.datatable');
    Route::get('/constants/{key}/create', [ConstantController::class,'create'])->name('constants.create');
    Route::post('/constants/{key}/store', [ConstantController::class,'store'])->name('constants.store');
    Route::get('/constants/{key}/{constant}/edit', [ConstantController::class,'edit'])->name('constants.edit');
    Route::put('/constants/{key}/{constant}/update', [ConstantController::class,'update'])->name('constants.update');
    Route::delete('/constants/{key}/{constant}/delete', [ConstantController::class,'destroy'])->name('constants.destroy');
    // Route::resource('/constants', ConstantController::class);

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');


    Route::get('/order/{order_id}/meal-details', [OrderMealDetailsController::class, 'index'])
        ->name('order.meal_details.index');
    Route::get('/order/{order_id}/meal-details/create', [OrderMealDetailsController::class, 'create'])
        ->name('order.meal_details.create');
    Route::post('/order/{order_id}/meal-details', [OrderMealDetailsController::class, 'store'])
        ->name('order.meal_details.store');


    Route::get('/order/{order_id}/select-driver', [DriverOrderRequestController::class, 'index'])
        ->name('order.select_driver.index');
    Route::get('/order/{order_id}/select-driver/create', [DriverOrderRequestController::class, 'create'])
        ->name('order.select_driver.create');
    Route::post('/order/{order_id}/select-driver', [DriverOrderRequestController::class, 'store'])
        ->name('order.select_driver.store');

    Route::get('/attachment/{image}', function ($image) {
        $attachment = \App\Models\Attachment::where('name', '=', $image)->first();
        $path = public_path('images') . '/' . $attachment->name;

        if (File::exists($path)) {
            File::delete($path);
            $attachment->delete();
            return redirect()->back()->with('success', 'تم حذف الصور بنجاح');
        } else {
            return redirect()->back()->with('error', 'الصورة غير موجودة');
        }
    })->name('attachment.destroy');

    Route::get('/dataTable', [UserController::class, 'dataTable'])->name('dataTable.index');
});

Auth::routes();
