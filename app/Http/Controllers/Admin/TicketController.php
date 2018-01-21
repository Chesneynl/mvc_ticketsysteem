<?php

namespace App\Http\Controllers\Admin;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class TicketController extends Controller
{
    /**
     * Show all the tickets!
     */
    public function index(Request $request)
    {

      if ($request->has('hide_done_tickets') && $request->get('hide_done_tickets')) {
        Session::put('hide_done_tickets', 1);
      }
      else if ($request->has('hide_done_tickets') && $request->get('hide_done_tickets') == 0) {
        Session::put('hide_done_tickets', 0);
      }

      if ($request->has('filter')) {
          if (session('hide_done_tickets')) {
              $tickets = Ticket::where('group',$request->get('filter'))->orderBy('completion_date','ASC')->whereNotIn('status', ['Done'])->get();
          }
          else {
              $tickets = Ticket::where('group',$request->get('filter'))->orderBy('completion_date','ASC')->get();
          }
      }
      else {
        if (session('hide_done_tickets')) {
            $tickets = Ticket::orderBy('completion_date','ASC')->whereNotIn('status', ['Done'])->get();
        }
        else {
              $tickets = Ticket::orderBy('completion_date','ASC')->get();
        }
      }


        $message = "";
        return view('admin.tickets.index', compact('tickets', 'message', 'request'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
          'name'             => 'required',
          'website'          => 'required',
          'completion_date'  => 'required|date',
          'user_id'          => 'required',
          'description'      => 'required',
        ]);

        $user_group = User::find(request('user_id'))->group;

        $originalDate = request('completion_date');
        $newDate = date("Y-m-d", strtotime($originalDate));

        Ticket::create([
          'name' => request('name'),
          'website' => request('website'),
          'completion_date' => $newDate,
          'description' => request('description'),
          'user_id' => request('user_id'),
          'group' => $user_group,
          'status' => "Planned in",
        ]);

        return redirect('/admin/tickets');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit(Request $request, Ticket $ticket)
   {
       $users = user::all();
       return view('admin.tickets.ticket.edit', compact('ticket', 'users'));
   }

   public function update(Request $request, Ticket $ticket)
   {
       $this->validate(request(), [
         'name'             => 'required',
         'website'          => 'required',
         'completion_date'  => 'required|date',
         'user_id'          => 'required',
         'description'      => 'required',
         'status'           => 'required',
       ]);

       $user_group = User::find(request('user_id'))->group;

       $originalDate = request('completion_date');
       $newDate = date("Y-m-d", strtotime($originalDate));

       $ticket->update([
         'name' => request('name'),
         'website' => request('website'),
         'completion_date' => $newDate,
         'description' => request('description'),
         'user_id' => request('user_id'),
         'group' => $user_group,
         'status' => request('status'),
       ]);

       $tickets = Ticket::orderBy('completion_date','ASC')->get();
       $message = "Ticket updated succesfully";

       return view('admin.tickets.index', compact('tickets', 'message'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $users = user::all();
       return view('admin.tickets.ticket.create', compact('users'));
   }

   public function delete(Request $request, Ticket $ticket)
   {
       $ticket->delete();
       $tickets = Ticket::orderBy('completion_date','ASC')->get();
       $message = "Ticket deleted succesfully.";

       return view('admin.tickets.index', compact('tickets', 'message'));
   }

   /**
    * Show all the tickets!
    */
   public function search(Request $request)
   {
       $message = "";
       if ($request->has('searchItem')) {
         $tickets = Ticket::where('name','LIKE', '%'. $request->get('searchItem') .'%')->get();
       }
       else {
         $message = "No tickets found.";
       }

       return view('admin.tickets.index', compact('tickets', 'message', 'request'));
   }
}
