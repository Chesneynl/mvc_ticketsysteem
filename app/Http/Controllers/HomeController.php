<?php

namespace App\Http\Controllers;

use Auth;
use App\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group_ids = $request->groups ?? [];

        
        $tickets = Auth::user()->tickets;
        return view('home', compact('tickets'));
    }
}
