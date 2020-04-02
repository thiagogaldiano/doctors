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

Route::middleware('auth:api')->get('/doctorsapi', function (Request $request) {
    Route::get('/doctors-json','DoctorsController@json');
});

Route::prefix('v1')->namespace('API')->group(function () {
    // Login
    Route::post('/login','AuthController@postLogin');
    // Register
    Route::post('/register','AuthController@postRegister');
    // Protected with APIToken Middleware
    Route::middleware('APIToken')->group(function () {
        // Logout
        Route::post('/logout','AuthController@postLogout');
    });
});
