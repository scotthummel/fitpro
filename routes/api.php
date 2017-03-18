<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'v1', 'middleware' => ['api', 'cors', 'jwt.auth']], function() {
    Route::resource('exercises', 'Api\ExerciseController');
    Route::resource('body-parts', 'Api\BodyPartController');
    Route::resource('exercise-categories', 'Api\ExerciseCategoryController');
    Route::resource('users', 'Api\UserController');
    Route::resource('workouts', 'Api\WorkoutController');
});

Route::group(['prefix' => 'v1', 'middleware' => ['api']], function () {
    Route::post('/authenticate', 'Api\AuthController@authenticate');
});
