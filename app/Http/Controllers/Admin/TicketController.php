<?php

namespace App\Http\Controllers\Admin;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{  
    /**
     * Show all the tickets!
     */
    public function index()
    {
        $ticket->status = 'closed';

        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }
}
