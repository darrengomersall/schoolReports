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

/*
|--------------------------------------------------------------------------
| Auth required
|--------------------------------------------------------------------------
|
| All routes require logged in user
|
*/

Route::get('/test', function () {
    return view('test', ['pupils' => \App\Pupil::with('current_class.grade')->get()]);
});

Route::group([ 'middleware' => ['auth'] ], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    /*------------- | STAFF | ------------- */

    // TEACHERS
    Route::get('/teachers/', 'StaffController@index');


    /*------------- | GRADES | ------------- */

    // VIEW ALL
    Route::get('/grades/', 'GradeController@index');

    // VIEW SINGLE
    Route::get('/grade/view/{id}', 'GradeController@show');

    // ADD NEW - FORM
    Route::get('/pupil/add', 'ClassGroupController@create');

    // ADD NEW - SAVE
    Route::post('/pupil/store', 'ClassGroupController@store');

    /*------------- | CLASSES | ------------- */
    // VIEW ALL
    Route::get('/classes/', 'ClassGroupController@index');

    // VIEW SINGLE
    Route::get('/class/view/{id}', 'ClassGroupController@show');

    // ADD NEW - FORM
    Route::get('/class/add', 'ClassGroupController@create');

    // ADD NEW - SAVE
    Route::post('/class/store', 'ClassGroupController@store');

    // ADD NEW - SAVE
    Route::get('/class/download/{id}', 'ClassGroupController@download');

    /*------------- | PUPILS | ------------- */

    // VIEW ALL
    Route::get('/pupils/', 'PupilController@index');

    // VIEW SINGLE
    Route::get('/pupil/view/{id}', 'PupilController@show');

    // ADD NEW - FORM
    Route::get('/pupil/add', 'PupilController@create');

    // ADD NEW - SAVE
    Route::post('/pupil/store', 'PupilController@store');

    // EDIT SINGLE
    Route::get('/pupil/edit/{id}', 'PupilController@edit');

    // PROMOTE SELECT GRADE
    Route::get('/pupil/promote/', 'PupilController@promote');
    Route::get('/pupils/promote/grade/{id}', 'PupilController@promoteGrade');
    Route::post('/pupils/promote/', 'PupilController@promoteStore');

    /*------------- | REPORTS | ------------- */

    // VIEW SINGLE
    Route::get('/report/view/{id}', 'ReportController@show');

    /*------------- | MARKS | ------------- */

    // ADD NEW - FORM
    Route::get('/report/{id}/mark/add', 'MarkController@create');

    // ADD NEW - FORM
    Route::post('/report/{id}/mark/save', 'MarkController@store');


} );




