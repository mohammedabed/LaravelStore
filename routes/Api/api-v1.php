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

Route::post('login', 'api\authController@login');


Route::get('test',function() {
    return 'hello1';
});

Route::middleware('auth:api')-> group(function () {
    //In Headers
    //Accept => application/json
    //Authorization => Bearer TOKEN

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::ApiResource('products', 'Api\productcontroller');

});
