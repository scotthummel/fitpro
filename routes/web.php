<?php


use App\Models\Exercise;
use App\Models\User;
use Illuminate\Http\Request;

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::resource('roles', 'Admin\RoleController');
    Route::post('roles/permissions', 'Admin\RoleController@permissions');
    Route::post('roles/users', 'Admin\RoleController@users');
    Route::resource('permissions', 'Admin\PermissionController');
    Route::resource('assign-exercises', 'Admin\AssignExercisesController');
});

/**
 * Searches
 */

Route::get('/users/search', function(Request $request) {
    $term = $request->term;

    $users = User::where('first_name', 'LIKE', '%' . $term . '%')
        ->orWhere('last_name', 'LIKE', '%' . $term . '%')
        ->orWhere('email',  'LIKE', '%' . $term . '%')
        ->get();

    $autocomplete = [];
    foreach ($users as $user) {
        $autocomplete[] = [
            'id' => $user->id,
            'label' => $user->first_name . ' ' . $user->last_name . ' (' . $user->email . ')',
            'value' => $user->first_name . ' ' . $user->last_name . ' (' . $user->email . ')'
        ];
    }

    return json_encode($autocomplete);
});

Route::get('/exercises/search', function(Request $request) {
    $term = $request->term;

    $exercises = Exercise::where('exercise_name',  'LIKE', '%' . $term . '%')->get();

    $autocomplete = [];
    foreach ($exercises as $exercise) {
        $autocomplete[] = [
            'id' => $exercise->id,
            'label' => $exercise->exercise_name,
            'value' => $exercise->exercise_name
        ];
    }

    return json_encode($autocomplete);
});