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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified']], function () {

    Route::get('/home', 'HomeController@index');

    Route::resource('users', 'UsersController');

    Route::resource('doctors', 'DoctorsController');

    Route::resource('specialties', 'SpecialtiesController');

    Route::resource('patients', 'PatientsController');

    Route::resource('schedules', 'SchedulesController');

    Route::get('/patients-ajax', 'PatientsController@ajax');

    Route::get('/doctors-ajax', 'DoctorsController@ajax');

});

Route::get('/doctors-json','DoctorsController@json');


