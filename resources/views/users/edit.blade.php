@extends('layouts.app')

@section('content') 
  <div class="container">
  <form class="form-horizontal" method="POST" action="{{action('UserController@update', $user->id) }}" >
  <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <h1>User {{ $user->id }}</h1>


    <div  class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name: </label>
        <div class="col-md-6"> 
        <input type="text" value='{{ $user->name }}' class="form-control" id="name" name="name" required autofocus/>
        </div>      
    </div>

     <div  class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
        <label for="phone_no" class="col-md-4 control-label">Phone No: </label>
        <div class="col-md-6"> 
        <input type="number" value='{{ $user->phone_no }}' id="phone_no" name="phone_no" class="form-control"/>
        </div>    
    </div>

    <div  class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Email: </label>
        <div class="col-md-6"> 
        <input type="email" value='{{ $user->email }}' id="email" class="form-control" name="email" readonly="readonly"/>
        </div>    
    </div>
    <div  class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password: </label>
        <div class="col-md-6"> 
        <input type="password" value='{{ $user->password }}' id="password" name="password" class="form-control"/>
        </div>    
    </div>
    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Update User
            </button>

        </div>
    </div>

</form>
</div>
@endsection 