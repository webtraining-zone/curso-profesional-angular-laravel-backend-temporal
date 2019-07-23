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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// CRUD: Create (POST), Read (GET), Update (PUT), Delete (DELETE)
Route::post('/projects', 'ProjectsController@createProject');
Route::delete('/projects/{id}', 'ProjectsController@deleteProject');
Route::get('/projects', 'ProjectsController@getAll')->name('projects.index');
Route::get('/projects/{id}', 'ProjectsController@getProjectById');


// @TODO: Auth
// JWT