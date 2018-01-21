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
    public function edit(Request $request, User $user)
    {
        return view('admin.users.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
          'name'             => 'required',
          'email'            => 'required|email',
          'group'            => 'required',
        ]);

        $user->update([
          'name' => request('name'),
          'email' => request('email'),
          'group' => request('group'),
        ]);

        return redirect('/admin/users');
    }
}
