<?php

use App\Ticket;
use App\User;

Route::get('/', function () {
    $tickets = Ticket::all();

    return view('home', compact('tickets'));
});

Route::get('/tickets/{ticket}', function ($id) {
    $ticket = Ticket::find($id);

    return view('ticket', compact('ticket'));
});

Route::get('about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/custom', [
  'uses' => 'LoginController@login',
  'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'], function() {


  Route::get('/home', function() {

    $userid = \Auth::user()->id;
    //$user = User::find($userid);
    $ticketDAO = new Ticket();
    $tickets =  $ticketDAO->TicketsByUserId($userid);

    return view('home', compact('tickets', 'user'));
  })->name('home');

  Route::get('/dashboard', function() {

    return view('dashboard', compact('tickets'));
  })->name('dashboard');


});
