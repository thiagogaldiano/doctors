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


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('users', 'UsersController');

Route::resource('doctors', 'DoctorsController');

Route::resource('specialties', 'SpecialtiesController');

Route::resource('patients', 'PatientsController');

Route::resource('schedules', 'SchedulesController');

Route::get('/patients-ajax','PatientsController@ajax');

Route::get('/doctors-ajax','DoctorsController@ajax');
