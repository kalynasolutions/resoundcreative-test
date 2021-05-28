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

Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('todos', 'Api\TodoController@index');
    Route::post('todos', 'Api\TodoController@store');
    Route::put('todos/{todoId}', 'Api\TodoController@update');
    Route::delete('todos/{todoId}', 'Api\TodoController@destroy');
});
