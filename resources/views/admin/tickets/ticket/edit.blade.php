@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">

          <div class="panel panel-default col-md-8 col-md-offset-2">
            <div class="panel-heading"><h2>Edit ticket</h2></div>
            <div class="panel-body ">
                <form class="form-horizontal" method="POST" action="/admin/tickets/ticket/{{ $ticket->id }}/edit/">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $ticket->name }}" >

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Group</label>

                        <div class="col-md-6">
                          <select name="group">
                              <option value="front-end">Front-end</option>
                              <option value="back-end">Back-end</option>
                              <option value="support">Support</option>
                          </select>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                        <label for="user_id" class="col-md-4 control-label">Assign to user </label>

                        <div class="col-md-6">
                            <select name="user_id">

                              @foreach ($users as $user)
                                @if ($ticket->user_id == $user->id)
                                  <option value="{{$user->id}}">{{$user->name}}</option>
                                @else
                                  <option selected value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                              @endforeach
                            </select>

                            @if ($errors->has('user_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label for="status" class="col-md-4 control-label">Status </label>

                        <div class="col-md-6">
                            <select name="status">
                                <option value="pending">Pending</option>
                                <option value="is working on">Is working on</option>
                                <option value="done">Done</option>
                            </select>

                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <textarea name="description">{{ $ticket->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
                                Save changes
                            </button>
                        </div>
                    </div>



                    @if (count($errors))
                    <div class="form-group">
                      <div class="alert alert-error">
                          <ul>
                            @foreach ($errors->all as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                  </div>
                  @endif
                </form>


            </div>
          </div>
      </div>
    </div>
</div>
@endsection
