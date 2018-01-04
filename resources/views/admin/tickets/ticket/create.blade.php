@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">

          <div class="panel panel-default col-md-8 col-md-offset-2">
            <div class="panel-heading"><h2>Create ticket</h2></div>
            <div class="panel-body ">
                <form class="form-horizontal" method="POST" action="/admin/tickets">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input  type="text" class="form-control" name="name" value="{{ old('name') }}" >

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                        <label for="website" class="col-md-4 control-label">Website</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="website" value="{{ old('website') }}" >

                            @if ($errors->has('website'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('website') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('completion_date') ? ' has-error' : '' }}">
                        <label for="completion_date" class="col-md-4 control-label">Completion date</label>

                        <div class="col-md-6">
                            <input id="datepicker" type="text" class="form-control" name="completion_date" value="{{ old('completion_date') }}" >

                            @if ($errors->has('completion_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('completion_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                        <label for="user_id" class="col-md-4 control-label">Assign to user </label>

                        <div class="col-md-6">
                            <select name="user_id">
                              <option value="" disabled selected>Select user</option>
                              @foreach ($users as $user)
                                @if (!$user->isAdmin())
                                  <option value="{{$user->id}}">{{$user->name}}</option>
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

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <textarea name="description"></textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Create ticket
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
