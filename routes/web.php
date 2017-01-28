<?php

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
   Route::resource('exercises', 'Admin\ExerciseController');
   Route::resource('exercise-categories', 'Admin\ExerciseCategoryController');
   Route::resource('body-parts', 'Admin\BodyPartController');
   Route::resource('muscles', 'Admin\MuscleController');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
