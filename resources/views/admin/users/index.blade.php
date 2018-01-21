@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">

            <div class="panel-body">

              <div class="ticket_section">
                <div class="panel-title">
                    <h2>Front-end</h2>
                    <hr>
                </div>
                  @foreach ($users as $user)
                    @if ($user->isFrontEnd() && !$user->isAdmin())
                      <div class="col-md-4 ticket {{$user->group}}" onclick="location.href='/admin/users/{{$user->id}}';">
                          <div class="title">{{$user->name }}</div>
                          <div class="open_tickets"> Open tickets : {{count($user->tickets) }} </div>
                      </div>
                    @endif
                  @endforeach
              </div>

              <div class="ticket_section">
                <div class="panel-title">
                    <h2>Back-end</h2>
                    <hr>
                </div>
                <div class="ticket_section">
                  @foreach ($users as $user)
                    @if ($user->isBackEnd() && !$user->isAdmin())
                      <div class="col-md-4 ticket {{$user->group}}" onclick="location.href='/admin/users/{{$user->id}}';">
                          <div class="title">{{$user->name }}</div>
                          <div class="open_tickets"> Open tickets : {{count($user->tickets) }} </div>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>

              <div class="ticket_section">
                <div class="panel-title">
                    <h2>Support</h2>
                    <hr>
                </div>
                <div class="ticket_section">
                  @foreach ($users as $user)
                    @if ($user->isSupport() && !$user->isAdmin())
                      <div class="col-md-4 ticket {{$user->group}}" onclick="location.href='/admin/users/{{$user->id}}';">
                          <div class="title">{{$user->name }}</div>
                          <div class="open_tickets"> Open tickets : {{count($user->tickets) }} </div>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>


            </div>
          </div>
      </div>
    </div>
</div>
@endsection
