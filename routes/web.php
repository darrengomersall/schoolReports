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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*------------- | PUPILS | ------------- */
// VIEW ALL
    Route::get('/pupils/', 'PupilController@index');

// VIEW SINGLE
    Route::get('/pupil/view/{id}', 'PupilController@show');

// ADD NEW - FORM
    Route::get('/pupil/add', 'PupilController@create');

// ADD NEW - SAVE
    Route::post('/pupil/store', 'PupilController@store');

/*------------- | CLASSES | ------------- */
// VIEW ALL
    Route::get('/classes/', 'ClassGroupController@index');

// VIEW SINGLE
    Route::get('/class/view/{id}', 'ClassGroupController@show');

// ADD NEW - FORM
    Route::get('/pupil/add', 'ClassGroupController@create');

// ADD NEW - SAVE
    Route::post('/pupil/store', 'ClassGroupController@store');




