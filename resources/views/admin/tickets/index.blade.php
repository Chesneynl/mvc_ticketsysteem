@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">

            <div class="panel-body">
                <div class="panel-title">
                    <h2>Tickets</h2>
                    <hr>
                    <div class="buttons">
                      @if (session('hide_done_tickets'))
                        <a class="btn btn-info" href="/admin/tickets?hide_done_tickets=0">Show finished tickets</a>
                      @else
                        <a class="btn btn-info" href="/admin/tickets?hide_done_tickets=1">Hide finished tickets</a>
                      @endif
                      <a class="btn btn-success" href="/admin/tickets/create/">Create ticket</a>
                    </div>
                </div>
                <div class="filters">
                  <div class="filter support col-md-4" onclick="location.href='?filter=support';">
                    Support

                  </div>
                  <div class="filter front-end col-md-4" onclick="location.href='?filter=front-end';">
                    Front-end
                  </div>
                  <div class="filter back-end col-md-4" onclick="location.href='?filter=back-end';">
                    Back-end
                  </div>
                </div>
                <form class="form-horizontal search_bar_wrapper" method="GET" action="/admin/tickets/search">
                      <div class="search_bar">
                          <input id="search" type="text" class="form-control" name="searchItem" placeholder="Search" >
                          <button>
                              <i class="fa fa-search" aria-hidden="true"></i>
                          </button>
                      </div>
                </form>
                @if ($message)
                  <div class="alert alert-warning">
                      {{$message}}
                  </div>
                @endif
                @if (!count($tickets))
                    <div class="alert alert-warning">no tickets found!</div>
                @else
                    @foreach ($tickets as $ticket)
                    <div class="ticket {{ $ticket->group  }} {{ $ticket->status }}  col-md-4 " onclick="location.href='/tickets/{{$ticket->id}}';">
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
