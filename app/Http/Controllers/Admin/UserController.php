<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{  
    /**
     * Show all the tickets!
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(Request $request, User $user)
    {
        abort_unless($request->user()->isAdmin(), 404);
        $tickets = $user->tickets;

        return view('admin.users.user.index', compact('user', 'tickets'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =  User::find($id);

        return view('admin.users.user.edit', compact('user'));
    }
}
