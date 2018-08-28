
@extends('layouts.app')

@section('content')

@if(Auth::user()->roles->first()->role == 'VIEWER')
<div style="text-align:center; font-size:30px;">
Hello {{{Auth::user()->name}}} ! <br> Welcome  to dashboard !
</div>
@else

<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id="tabMenu">
      @can('viewAdmin',Auth::user())
        <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Admin Panel</a></li>
        @endcan

         @can('viewManager',Auth::user())
        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Manager Panel</a></li>
        @endcan

         @can('viewViewer',Auth::user())
        <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Viewer Panel</a></li>
        @endcan
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
         @can('viewAdmin',Auth::user())
        <div role="tabpanel" class="tab-pane active" id="tab1">
        @can('createAdmin',Auth::user())
        <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
        <li><a href="{{ url('users/create/' . 'ADMIN') }}">Add Admin</a></li>
        </ul>
        </nav>
        @endcan

        @if(!count($admin_users))
            No Admins are available!    
        @else 
        <h1>Admin Listing</h1>
        <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date of Joining</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody> 
    @foreach($admin_users as $key => $user) 

    @can('view',$user)
    <!-- The Current User Can Update The Post -->
    @if ($user->roles->first()->role != 'SUPER-ADMIN')
    <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{$user->roles->first()->role}}</td>
            <td>{{ $user->created_at }}</td>
            <td>

            @can('view',$user)
            <a class="btn btn-small btn-primary" href="{{ URL::to('users/' . $user->id) }}">View</a>
            @endcan

            @can('update',$user)
            <a class="btn btn-small btn-info" href="{{ route('users.edit', $user->id) }}">Edit</a>
            @endcan


            @can('delete',$user)
             <a class="delete_record"> 
            <form class="form-horizontal" method="POST" action="{{action('UserController@destroy', $user->id) }}" >
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="working_tab" value="tab1">
            <button type="submit" class="btn btn-small btn-danger">
                Delete
            </button>
            </form>
            </a>
            @endcan

            </td>
    </tr>
    @endif


@endcan
@endforeach
</tbody>
</table>
@endif
        </div>
        @endcan

        @can('viewManager',Auth::user())
        <div role="tabpanel" class="tab-pane" id="tab2">
        @can('createManager',Auth::user())
        <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
        <li><a href="{{ url('users/create/' . 'MANAGER') }}">Add Manager</a></li>
        </ul>
        </nav>
        @endcan

        @if(!count($manager_users))
            No Managers are available!    
        @else 
        <h1>Manager Listing</h1>
        <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date of Joining</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody> 
    @foreach($manager_users as $key => $user) 

    @can('view',$user)
    <!-- The Current User Can Update The Post -->
    @if ($user->roles->first()->role != 'SUPER-ADMIN')
    <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{$user->roles->first()->role}}</td>
            <td>{{ $user->created_at }}</td>
            <td>

            @can('view',$user)
            <a class="btn btn-small btn-primary" href="{{ URL::to('users/' . $user->id) }}">View</a>
            @endcan

            @can('update',$user)
            <a class="btn btn-small btn-info" href="{{ route('users.edit', $user->id) }}">Edit</a>
            @endcan


            @can('delete',$user)
             <a class="delete_record"> 
            <form class="form-horizontal" method="POST" action="{{action('UserController@destroy', $user->id) }}" >
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="working_tab" value="tab2">
            <button type="submit" class="btn btn-small btn-danger">
                Delete
            </button>
            </form>
            </a>
            @endcan

            </td>
    </tr>
    @endif


@endcan
@endforeach
</tbody>
</table>
@endif
        </div>
        @endcan

        @can('viewViewer',Auth::user())
        <div role="tabpanel" class="tab-pane" id="tab3">

        @can('createViewer',Auth::user())
        
        <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
        <li><a href="{{ url('users/create/' . 'VIEWER') }}">Add Viewer</a></li>
        </ul>
        </nav>
        @endcan

        @if(!count($viewer_users))
            No Viewers are available!    
        @else 
        <h1>Viewer Listing</h1>
        <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date of Joining</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody> 
    @foreach($viewer_users as $key => $user) 

    @can('view',$user)
    <!-- The Current User Can Update The Post -->
    @if ($user->roles->first()->role != 'SUPER-ADMIN')
    <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{$user->roles->first()->role}}</td>
            <td>{{ $user->created_at }}</td>
            <td>

            @can('view',$user)
            <a class="btn btn-small btn-primary" href="{{ URL::to('users/' . $user->id) }}">View</a>
            @endcan

            @can('update',$user)
            <a class="btn btn-small btn-info" href="{{ route('users.edit', $user->id) }}">Edit</a>
            @endcan

            @can('delete',$user)
             <a class="delete_record"> 
            <form class="form-horizontal" method="POST" action="{{action('UserController@destroy', $user->id) }}" >
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="working_tab" value="tab3">
            <button type="submit" class="btn btn-small btn-danger">
                Delete
            </button>
            </form>
            </a>
            @endcan

            </td>
    </tr>
    @endif


@endcan
@endforeach
</tbody>
</table>
@endif
        </div>
        @endcan
    </div>
</div>
@endif


@endsection



