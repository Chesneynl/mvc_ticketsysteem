<?php

namespace App\Http\Controllers\Admin;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Show all the tickets!
     */
    public function index(Request $request)
    {
        //dd($request);
        if ($request->has('filter')) {
          $tickets = Ticket::all()->where('group',$request->get('filter'));
        }
        else {
          $tickets = Ticket::all();
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
        'name' => 'required',
      ]);

        Ticket::create([
          'name' => request('name'),
          'user_id' => request('user_id'),
          'group' => request('group'),
          'status' => "Nog in te plannen",
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

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function filterFrontEnd(Request $request)
  {
      $tickets = Ticket::all();
      $message = "";
      return view('admin.tickets.index', compact('tickets', 'message'));
  }

   public function update(Request $request, Ticket $ticket)
   {
       $ticket->update([
         'name' => request('name'),
         'user_id' => request('user_id'),
         'group' => request('group'),
         'description' => request('description')
       ]);

       $ticket->staus = request('status');

       $tickets   = Ticket::all();
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
       $tickets   = Ticket::all();
       $message = "Ticket deleted succesfully.";

       return view('admin.tickets.index', compact('tickets', 'message'));
   }

    /*

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Ticket::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/
}
