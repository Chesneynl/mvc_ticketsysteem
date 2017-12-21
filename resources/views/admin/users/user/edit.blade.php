@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          <div class="panel panel-default">
          
            <div class="panel-body">
                <div class="panel-title">
                    <h2>{{$user->name }}</h2>
                </div>
                <div class="user_info">
                    <div class="user_email">{{$user->email }}</div>
                    <div class="user_created_at">Aangemaakt op : {{$user->created_at }}</div>
                    <div class="user_status">Admin : {{$user->admin }}</div>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection