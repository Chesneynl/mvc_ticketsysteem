@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">

            <div class="panel-body">
                <div class="panel-title">
                    <h2>{{$ticket->name }}</h2>
                </div>
                <div class="ticket_details">
                    <div class="status">
                        {{ $ticket->status  }}
                    </div>
                    <div class="created_at">
                        Aangemaakt op : {{ $ticket->created_at  }}
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection