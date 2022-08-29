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
Route::post('/auth/register', [App\Http\Controllers\Api\AuthController::class, 'createUser']);
Route::post('/auth/login', [App\Http\Controllers\Api\AuthController::class, 'loginUser']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/logout', [App\Http\Controllers\Api\AuthController::class, 'logoutUser']);
    Route::post('/auth/infoRegister', [App\Http\Controllers\Api\AuthController::class, 'infoRegister']);
    Route::apiResource('/meals', 'App\Http\Controllers\Api\MealsController');
    Route::get('/restaurants', [App\Http\Controllers\Api\MealsController::class, 'indexRestaurants']);

    //category
    Route::get('/categories', [App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::get('/categories/{id}',[App\Http\Controllers\Api\CategoryController::class, 'show'])->name('categories.show');

    //orders


});



