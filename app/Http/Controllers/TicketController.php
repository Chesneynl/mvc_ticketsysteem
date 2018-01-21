<?php

namespace App\Http\Controllers;

use Auth;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Auth::user()->tickets;

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Ticket $ticket)
    {
        abort_unless($request->user()->isAdmin() || $request->user()->owns($ticket), 404);

        return view('tickets.ticket.index', compact('ticket'));
    }

    public function delete(Request $request, Ticket $ticket)
    {
        $ticket->delete();
        $tickets = Ticket::all();
        $message = "Ticket deleted succesfully.";

        return view('admin.tickets.index', compact('tickets', 'message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Ticket $ticket)
    {
        if ($ticket->status == "Planned in") {
            $ticket->update([
              'status' => 'Is working on',
            ]);
        }
        else if ($ticket->status == "Is working on") {
            $ticket->update([
              'status' => 'Done',
            ]);
        }
        return redirect('tickets');
    }
}
