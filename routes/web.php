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

    Route::get('/users', 'UsersController@index')->name('users.index')->middleware('permission:view.users');

    Route::post('/users', 'UsersController@store')->name('users.store')->middleware('permission:view.users');

    Route::get('/users/create', 'UsersController@create')->name('users.create')->middleware('permission:create.users');

    Route::get('/users/{user}', 'UsersController@show')->name('users.show')->middleware('permission:view.users');

    Route::patch('/users/{user}', 'UsersController@update')->name('users.update')->middleware('permission:edit.users');

    Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy')->middleware('permission:delete.users');

    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit')->middleware('permission:edit.users');

    Route::get('/doctors', 'DoctorsController@index')->name('doctors.index')->middleware('permission:view.doctors');

    Route::post('/doctors', 'DoctorsController@store')->name('doctors.store')->middleware('permission:view.doctors');

    Route::get('/doctors/create', 'DoctorsController@create')->name('doctors.create')->middleware('permission:create.doctors');

    Route::get('/doctors/{user}', 'DoctorsController@show')->name('doctors.show')->middleware('permission:view.doctors');

    Route::patch('/doctors/{user}', 'DoctorsController@update')->name('doctors.update')->middleware('permission:edit.doctors');

    Route::delete('/doctors/{user}', 'DoctorsController@destroy')->name('doctors.destroy')->middleware('permission:delete.doctors');

    Route::get('/doctors/{user}/edit', 'DoctorsController@edit')->name('doctors.edit')->middleware('permission:edit.doctors');

    Route::get('/specialties', 'SpecialtiesController@index')->name('specialties.index')->middleware('permission:view.specialties');

    Route::post('/specialties', 'SpecialtiesController@store')->name('specialties.store')->middleware('permission:view.specialties');

    Route::get('/specialties/create', 'SpecialtiesController@create')->name('specialties.create')->middleware('permission:create.specialties');

    Route::get('/specialties/{user}', 'SpecialtiesController@show')->name('specialties.show')->middleware('permission:view.specialties');

    Route::patch('/specialties/{user}', 'SpecialtiesController@update')->name('specialties.update')->middleware('permission:edit.specialties');

    Route::delete('/specialties/{user}', 'SpecialtiesController@destroy')->name('specialties.destroy')->middleware('permission:delete.specialties');

    Route::get('/specialties/{user}/edit', 'SpecialtiesController@edit')->name('specialties.edit')->middleware('permission:edit.specialties');

    Route::resource('patients', 'PatientsController');

    Route::resource('schedules', 'SchedulesController');

    Route::get('/patients-ajax', 'PatientsController@ajax');

    Route::get('/doctors-ajax', 'DoctorsController@ajax');

});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/doctors-json','DoctorsController@json');
});



