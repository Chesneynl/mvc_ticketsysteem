@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
              <div class="panel-body">
                  {{ $ticket->name  }}{{ $ticket->id  }}
            </div>
        </div>
    </div>
</div>
@endsection
