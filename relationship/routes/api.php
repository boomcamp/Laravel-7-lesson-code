<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('mentors', 'MentorController@index');
Route::group(['prefix' => 'mentor'], function () {
    Route::post('add', 'MentorController@add');
    Route::get('edit/{id}', 'MentorController@edit');
    Route::post('update/{id}', 'MentorController@update');
    Route::delete('delete/{id}', 'MentorController@delete');
});