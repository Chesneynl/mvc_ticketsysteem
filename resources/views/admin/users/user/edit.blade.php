@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">

          <div class="panel panel-default col-md-8 col-md-offset-2">
            <div class="panel-heading"><h2>Edit profile</h2></div>
            <div class="panel-body ">
                <form class="form-horizontal" method="POST" action="/admin/tickets">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" >

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" >

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
                        <label for="group" class="col-md-4 control-label">Group</label>



                        <div class="col-md-6">
                            <select name="group">
                                <option value="front-end">Front-end</option>
                                <option value="back-end">Back-end</option>
                                <option value="support">Support</option>
                            </select>

                            @if ($errors->has('group'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('group') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="status" class="col-md-4 control-label">New password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" value="{{ $user->password }}" >

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
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
