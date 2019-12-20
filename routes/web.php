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

// RESTful functions for school
Route::get('/schools', 'SchoolsController@index');
Route::post('/schools', 'SchoolsController@store');
Route::get('/schools/create', 'SchoolsController@create');
Route::get('/schools/{school}', 'SchoolsController@show');
Route::put('/schools/{school}', 'SchoolsController@update');
Route::get('/schools/{school}/edit', 'SchoolsController@edit');
Route::delete('/schools/{school}/delete', 'SchoolsController@destroy');

// RESTful functions for school admin
Route::get('/schoolAdmin', 'SchoolAdminController@index');
Route::post('/schoolAdmin', 'SchoolAdminController@store');
Route::get('/schoolAdmin/create', 'SchoolAdminController@create');
Route::get('/schoolAdmin/{schoolAdmin}', 'SchoolAdminController@show');
Route::put('/schoolAdmin/{schoolAdmin}', 'SchoolAdminController@update');
Route::get('/schoolAdmin/{schoolAdmin}/edit', 'SchoolAdminController@edit');
Route::delete('/schoolAdmin/{schoolAdmin}/delete', 'SchoolAdminController@destroy');

// RESTful functions for approving student registration
Route::get('/approve', 'ApprovalController@index');
Route::get('/approve/{approve}', 'ApprovalController@show');
Route::put('/approve/{approve}', 'ApprovalController@update');

// RESTful functions for students
Route::get('/students', 'StudentsController@index');
Route::post('/students', 'StudentsController@store');
Route::get('/students/create', 'StudentsController@create');
Route::get('/students/{student}', 'StudentsController@show');
Route::put('/students/{student}', 'StudentsController@update');
Route::get('/students/{student}/edit', 'StudentsController@edit');
Route::delete('/students/{student}/delete', 'StudentsController@destroy');

// RESTful functions for personal info
Route::get('/persinfo', 'PersonalInformationController@index');
Route::post('/persinfo', 'PersonalInformationController@store');
Route::get('/persinfo/create', 'PersonalInformationController@create');
Route::put('/persinfo/{persinfo}', 'PersonalInformationController@update');
Route::get('/persinfo/{persinfo}/edit', 'PersonalInformationController@edit');
Route::delete('/persinfo/{persinfo}/delete', 'PersonalInformationController@destroy');

// RESTful functions for projects
Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store');
Route::get('/projects/create', 'ProjectController@create');
Route::get('/projects/{project}', 'ProjectController@show');
Route::put('/projects/{project}', 'ProjectController@update');
Route::get('/projects/{project}/edit', 'ProjectController@edit');
Route::delete('/projects/{project}/delete', 'ProjectController@destroy');

// RESTful functions for readings
Route::get('/readings', 'ReadingController@index');
Route::post('/readings', 'ReadingController@store');
Route::get('/readings/create', 'ReadingController@create');
Route::get('/readings/{reading}', 'ReadingController@show');
Route::put('/readings/{reading}', 'ReadingController@update');
Route::get('/readings/{reading}/edit', 'ReadingController@edit');
Route::delete('/readings/{reading}/delete', 'ReadingController@destroy');

// Authentication of users
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
