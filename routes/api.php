<?php

use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RestaurantController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\MealsController;
use App\Http\Controllers\Api\V1\ContactUsController;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/logout', [AuthController::class, 'logoutUser']);
    Route::post('/auth/infoRegister', [AuthController::class, 'infoRegister']);

    // Route::get('/restaurants', [App\Http\Controllers\Api\MealsController::class, 'indexRestaurants']);
    Route::get('/restaurants', [RestaurantController::class, 'index']);

    //category
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

    //orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);

    // meals
    // Route::apiResource('/meals', MealsController::class);
    Route::get('/meals', [MealsController::class, 'index']);
    Route::get('/meals/search', [MealsController::class, 'search']);
    Route::get('/meals/{id}', [MealsController::class, 'show']);

    // contact us
    Route::post('/contact_us', [ContactUsController::class, 'store']);


});
