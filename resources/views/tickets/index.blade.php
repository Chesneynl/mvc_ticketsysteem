@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">

            <div class="panel-body">
                <div class="panel-title">
                    <h2>Tickets</h2>
         
                </div>
                <div class="filters">
                  <div class="filter support col-md-4" >
                    Support
                  </div>
                  <div class="filter front-end col-md-4" >
                    Front-end
                  </div>
                  <div class="filter back-end col-md-4" >
                    Back-end
                  </div>
                </div>
                @if (!count($tickets))
                    <div class="alert alert-warning">no tickets found!</div>
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