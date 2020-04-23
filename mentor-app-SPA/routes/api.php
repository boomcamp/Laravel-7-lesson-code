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

/**
Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

Route::get('mentors', 'MentorController@index');
Route::group(['prefix' => 'mentor'], function () {
    Route::post('add', 'MentorController@add');
    Route::get('edit/{id}', 'MentorController@edit');
    Route::post('update/{id}', 'MentorController@update');
    Route::delete('delete/{id}', 'MentorController@delete');
});
**/

//http://127.0.0.1:8000/api/login
Route::post("login", "UserController@index");

//http://127.0.0.1:8000/api/users
Route::middleware('auth:sanctum')->get("users", "UserController@getUsers"); 

//http://127.0.0.1:8000/api/mentors
Route::middleware('auth:sanctum')->get("mentors", "MentorController@index"); 

//http://127.0.0.1:8000/api/mentor
Route::group(['prefix' => 'mentor'], function () {

	//api/mentor/add
    Route::middleware('auth:sanctum')->post("add", "MentorController@add"); 

    //api/mentor/edit/{id}
    Route::middleware('auth:sanctum')->get("edit/{id}", "MentorController@edit"); 

    //api/mentor/update/{id}
    Route::middleware('auth:sanctum')->post("update/{id}", "MentorController@update");

    //api/mentor/delete/{id}
    Route::middleware('auth:sanctum')->delete("delete/{id}", "MentorController@delete");
});
