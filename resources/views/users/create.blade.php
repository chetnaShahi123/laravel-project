@extends('layouts.app')

@section('content')
<div class="container">

<h1>Add {{$roleInstance->role}}</h1>

<!-- if there are creation errors, they will show here -->


<form class="form-horizontal" method="POST" action="{{ route('users.store') }}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="role_id" value="{{$roleInstance->id}}">

    <div class="form-group{{ $errors->has('make') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                @if ($errors->has('name'))
                     <span class="help-block">
                         <strong>{{ $errors->first('name') }}</strong>
                     </span>
                @endif
        </div>
    </div>

     <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone" class="col-md-4 control-label">Conatct N0</label>
        <div class="col-md-6">
            <input id="phone" type="number" class="form-control" name="phone" value="" required autofocus>

                @if ($errors->has('phone'))
                     <span class="help-block">
                         <strong>{{ $errors->first('phone') }}</strong>
                     </span>
                @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="dob" class="col-md-4 control-label">DOB</label>
        <div class="col-md-6">
            <input id="dob" type="text" class="form-control" name="dob" value="" required autofocus>

                @if ($errors->has('dob'))
                     <span class="help-block">
                         <strong>{{ $errors->first('dob') }}</strong>
                     </span>
                @endif
        </div>
    </div>

@if($roleInstance->role == 'VIEWER' || $roleInstance->role == 'MANAGER')
<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="address" class="col-md-4 control-label">Address</label>
        <div class="col-md-6">
            <input id="address" type="text" class="form-control" name="address" value="" required autofocus>

                @if ($errors->has('address'))
                     <span class="help-block">
                         <strong>{{ $errors->first('address') }}</strong>
                     </span>
                @endif
        </div>
    </div>

@if($roleInstance->role == 'VIEWER')
<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="skill" class="col-md-4 control-label">Skill</label>
        <div class="col-md-6">
            <input id="skill" type="text" class="form-control" name="skill" value="" required autofocus>

                @if ($errors->has('skill'))
                     <span class="help-block">
                         <strong>{{ $errors->first('skill') }}</strong>
                     </span>
                @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('hobbies') ? ' has-error' : '' }}">
        <label for="hobbies" class="col-md-4 control-label">Hobbies</label>
        <div class="col-md-6">
            <input id="hobbies" type="text" class="form-control" name="hobbies" value="" required autofocus>

                @if ($errors->has('hobbies'))
                     <span class="help-block">
                         <strong>{{ $errors->first('hobbies') }}</strong>
                     </span>
                @endif
        </div>
    </div>
@endif
@endif


    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Email</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                @if ($errors->has('email'))
                     <span class="help-block">
                         <strong>{{ $errors->first('email') }}</strong>
                     </span>
                @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" value="" required autofocus>

                @if ($errors->has('password'))
                     <span class="help-block">
                         <strong>{{ $errors->first('password') }}</strong>
                     </span>
                @endif
        </div>
    </div>

   <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>

                            </div>
        </div>

</form>

</div>
@endsection 
