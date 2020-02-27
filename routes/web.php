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
Route::post('/home/newCard','HomeController@newCard');
Route::post('/home/newTask/{id}','HomeController@newTask');
Route::get('/home/delete/{id}','HomeController@deleteCard');

//Process Task
Route::post('/home/newTaskProcess','HomeController@insertTask');
Route::get('/home/deleteTask/{id}','HomeController@deleteTask');
Route::get('/home/updateToProcess/{id}','HomeController@process');
Route::get('/home/updateToFinish/{id}','HomeController@finish');


//history & calendar
Route::get('/home/history','secondController@index');
Route::get('/home/email','secondController@mail');
Route::get('/home/kalender','secondController@calendar');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
