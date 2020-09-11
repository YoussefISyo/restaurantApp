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

// user Related

Route::get('users','Api\UserController@index');

Route::get('user/{id}','Api\UserController@show');

Route::get('orders/user/{id}','Api\UserController@orders');


// End User Related

//Category Related

Route::get('categories','Api\CategoryController@index');

Route::get('category/{id}', 'Api\CategoryController@show');

Route::get('meals/categories/{id}','Api\CategoryController@meals');

//End Category Related

//Meal Related

Route::get('meals','Api\MealController@index');

Route::get('meal/{id}','Api\MealController@show');

//End Meal Related

//Order Related

Route::get('orders','Api\OrderController@index');

Route::get('order/{id}','Api\OrderController@show');

Route::get('contents/order/{id}','Api\OrderController@orderContents');

//End Order Related

Route::post('register', 'Api\UserController@store');
Route::post('token', 'Api\UserController@gettoken');



Route::middleware('auth:api')->group(function(){

    Route::post('update_user/{id}', 'Api\UserController@update');

    Route::post('category', 'Api\CategoryController@store');

    Route::post('meal', 'Api\MealController@store');

    Route::post('order', 'Api\OrderController@store');

    Route::post('content', 'Api\OrderController@contents');

    Route::post('category/{id}', 'Api\CategoryController@update');

    Route::post('meal/{id}', 'Api\MealController@update');

    Route::delete('user/{id}', 'Api\UserController@destroy');

    Route::delete('category/{id}', 'Api\CategoryController@destroy');

    Route::delete('meal/{id}', 'Api\MealController@destroy');

    Route::delete('order/{id}', 'Api\OrderController@destroy');

    Route::delete('content/{id}', 'Api\OrderController@destroyContent');

});
