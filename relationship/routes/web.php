<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//http://localhost:8000/api/oneQuery
//http://localhost:8000/api/oneMany
//http://localhost:8000/api/manyMany
Route::group([
	
	'prefix'=>'api','as' =>'api', 
	'middleware' => 'role'

], function(){

    Route::get('oneQuery','RelationController@OneToOne')->name('oneQuery');
    Route::get('oneMany','RelationController@OneToMany')->name('oneMany');
    Route::get('manyMany','RelationController@ManyToMany')->name('manyMany');
});

//These are the new router for our CRUD application
//http://localhost:8000/apiv2/saveOneOne
//http://localhost:8000/apiv2/saveOneMany
//http://localhost:8000/apiv2/saveManyMany
Route::group([
	
	'prefix'=>'api','as' =>'api', 
	'middleware' => 'role'
	
], function(){
	Route::get('saveOneOne','RelationController@saveOneOne')->name('saveOneOne');
    Route::get('saveOneMany','RelationController@saveOneMany')->name('saveOneMany');
    Route::get('saveManyMany','RelationController@saveManyMany')->name('saveManyMany');
});


Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');