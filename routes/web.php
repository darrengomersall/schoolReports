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



