@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">

            <div class="panel-body">
              <div class="panel-title">
                  <h2>Users</h2>
                  <hr>
              </div>

                @if (!count($users))
                    <div class="alert alert-warning">no users found!!</div>
                @else
                    @foreach ($users as $user)
                    <div class="col-md-4 ticket {{$user->group}}" onclick="location.href='/admin/users/{{$user->id}}';">
                        <div class="title">{{$user->name }}</div>
                        <div class="open_tickets"> Open tickets : {{count($user->tickets) }} </div>
                    </div>
                    @endforeach
                @endif
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
