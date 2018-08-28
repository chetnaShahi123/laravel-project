@extends('layouts.app')

@section('content')
 <div class="view_user"> 
    <h1> {{$user->roles->first()->role}} Panel (Record N0 :{{ $user->id }})</h1>
    <ul>
      <li>Name: {{ $user->name }}</li>
      <li>Email: {{ $user->email }}</li>
      <li>Phone N0: {{ $user->phone_no }}</li>
    </ul>
</div>
    @endsection 
  