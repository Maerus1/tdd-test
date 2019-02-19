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

Route::name('todo.')->group(function () {
    Route::get('/todo/{id}', 'TodoController@index')->name('read');
    Route::post('/todo/{id}', 'TodoController@create')->name('insert');
    Route::put('/todo/{id}', 'TodoController@update')->name('update');
    Route::delete('/todo/{user_id}/{item_id}', 'TodoController@delete')->name('delete');
});
