@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">

            <div class="panel-body">
                <div class="panel-title">
                    <h2>Dashboard</h2>
                    <hr>
                </div>

                @if (!count($tickets))
                    <div class="alert alert-warning">no tickets found!</div>
                @else
                  @foreach ($tickets as $ticket)
                    <div class="ticket {{ $ticket->group  }} col-md-4 " onclick="location.href='/tickets/{{$ticket->id}}';">
                        <div class="title">{{$ticket->name }}</div>
                        <div class="completion_date">{{$ticket->completion_date }}</div>
                        <div class="status">{{$ticket->website}}</div>
                    </div>
                  @endforeach
                @endif
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
