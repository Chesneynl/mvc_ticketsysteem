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
                @if (empty($tickets))
                  <div class="error_message">
                    Er zijn geen tickets beschikbaar.
                  </div>
                @endif
                <?php echo '<pre>';var_dump($tickets); exit;?>
                @foreach ($tickets as $ticket)
                  <div class="ticket {{ $ticket->group  }} col-md-4 " onclick="location.href='/tickets/{{$ticket->id}}';">
                    <div class="title">{{$ticket->name }}</div>
                    <div class="status">{{$ticket->status }}</div>
                  </div>
                @endforeach
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
