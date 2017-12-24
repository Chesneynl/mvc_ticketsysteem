@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">

            <div class="panel-body">
                <div class="panel-title">
                    <h2>{{$user->name }}</h2>
                    <hr>
                    <div class="buttons">
                        <a class="btn btn-success" href="/admin/users/{{$user->id}}/edit">edit profile</a>
                    </div>
                </div>
                <div class="user_info">
                    <div class="user_email">{{$user->email }}</div>
                    <div class="user_created_at">Created at : {{$user->created_at }}</div>
                    <div class="user_status">Admin : {{$user->admin }}</div>
                </div>
                <div class="panel-title">
                    <h2>Tickets</h2>
                </div>
                @if (!count($tickets))
                    <div class="alert alert-warning">No tickets found!</div>
                @else
                    @foreach ($tickets as $ticket)
                    <div class="ticket {{ $ticket->group  }} col-md-4 " onclick="location.href='/tickets/{{$ticket->id}}';">
                        <div class="title">{{$ticket->name }}</div>
                        <div class="status">{{$ticket->status }}</div>
                    </div>
                    @endforeach
                @endif

            </div>
          </div>
      </div>
    </div>
</div>
@endsection
