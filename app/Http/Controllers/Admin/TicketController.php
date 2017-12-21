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
        //$ticket->status = 'closed';

        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket =  Ticket::find($id);

        return view('admin.tickets.ticket.edit', compact('ticket'));
    }
    
    protected function create(array $data)
    {
        return Ticket::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
