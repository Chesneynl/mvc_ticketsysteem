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
    return view('/login');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('tickets', 'TicketController@index');
Route::get('tickets/{ticket}', 'TicketController@show');


Route::middleware(['admin'])->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('tickets', 'TicketController@index');
    Route::get('users', 'TicketController@index');
});