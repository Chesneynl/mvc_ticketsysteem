@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">

            <div class="panel-body">
                @if (!count($users))
                    <div class="alert alert-warning">no users found!!</div>
                @else
                    @foreach ($users as $user)
                    <div class="col-md-4 ticket" onclick="location.href='/admin/users/{{$user->id}}';">
                        <div class="title">{{$user->name }}</div>
                    </div>
                    @endforeach
                @endif
            </div>
          </div>
      </div>
    </div>
</div>
@endsection