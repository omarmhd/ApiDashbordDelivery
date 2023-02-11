<?php

use App\Http\Controllers\Api\V1\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RestaurantController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ConstantController;
use App\Http\Controllers\Api\V1\MealsController;
use App\Http\Controllers\Api\V1\ContactUsController;
use App\Http\Controllers\Api\V1\DriverController;
use App\Http\Controllers\Api\V1\EmailVerificationController;
use App\Http\Controllers\Api\V1\NewPasswordController;

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
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('get-token', [NewPasswordController::class, 'getToken']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/logout', [AuthController::class, 'logoutUser']);
    Route::post('/auth/infoRegister', [AuthController::class, 'infoRegister']);

    // Route::get('/restaurants', [App\Http\Controllers\Api\MealsController::class, 'indexRestaurants']);
    Route::get('/restaurants', [RestaurantController::class, 'index']);
    Route::get('/constants/{key}', [ConstantController::class, 'index']);
    Route::get('/setting', [ConstantController::class, 'setting']);


    //category
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::get('/categories/{id}/meals', [CategoryController::class, 'meals']);

    //orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/order/{id}', [OrderController::class, 'show']);

    // meals
    // Route::apiResource('/meals', MealsController::class);
    Route::get('/meals', [MealsController::class, 'index']);
    Route::get('/meals/search', [MealsController::class, 'search']);
    Route::get('/meals/{id}', [MealsController::class, 'show']);

    // contact us
    Route::post('/contact_us', [ContactUsController::class, 'store']);

    // Driver
    Route::get('driver_personal', [DriverController::class, 'index']);
    Route::get('driver_orders', [DriverController::class, 'orders']);
    Route::get('received_orders', [DriverController::class, 'received_orders']);
    Route::post('driver_accept_reject_order', [DriverController::class, 'driver_accept_reject_order']);
    Route::get('driver_completed_orders', [DriverController::class, 'driver_completed_orders']);



    // Driver Orders Requests
    Route::get('driver_current_orders', [DriverController::class, 'currantOrders']);

    // Admin id 1 5|HdtELzMVvt2N0HIq88xE8QOHTuWoRMc1ZF7CSbZ1
    // Driver id 10 4|ppRl9GdjsRfiHBIUnK4FqXqVOyJvuUe0B0t0qYLh
    Route::get('home', [HomeController::class, 'index']);
});
// Route::get('driver_current_orders', [DriverController::class, 'currantOrders']);
// Route::get('driver_current_orders', [DriverController::class, 'currantOrders']);

// Route::get('driver_orders', [DriverController::class, 'orders']);

