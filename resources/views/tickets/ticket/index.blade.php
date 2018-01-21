@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">

            <div class="panel-body">
                <div class="panel-title">
                    <h2>{{$ticket->name }}</h2>
                    <hr>
                    <div class="buttons">
                      @if (Auth::user()->isAdmin() )
                      <a class="btn btn-warning" href="/admin/tickets/ticket/{{$ticket->id}}/edit/">Edit ticket</a>
                      <a class="btn btn-danger" href="/admin/tickets/ticket/{{$ticket->id}}/delete">Delete ticket</a>
                      @else
                        @if ($ticket->isPlannedIn())
                          <a class="btn btn-success" href="/tickets/{{$ticket->id}}/update-status/">Mark as started</a>

                        @elseif ($ticket->isWorkingOn())
                          <a class="btn btn-success" href="/tickets/{{$ticket->id}}/update-status/">Mark as done</a>
                        @else
                          Task is done
                        @endif
                      @endif
                    </div>
                </div>
                <div class="ticket_details">
                    <div class="ticket_information">
                        <strong> Status :</strong> {{ $ticket->status  }} <br />
                        <strong> Created at :</strong> {{ $ticket->created_at  }} <br />
                        <strong> Completion date :</strong> {{ $ticket->completion_date  }} <br />
                        <strong> Website :</strong> {{ $ticket->website  }} <br /> <br />
                    </div>
                    <div class="description">
                        <strong>Description : </strong><br /> {{ $ticket->description  }}
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
