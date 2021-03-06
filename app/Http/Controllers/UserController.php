<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use Session;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roleIdAuthentication', ['only' => ['edit', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewer_users = Role::where('role', 'VIEWER')->first()->users;
        $admin_users = Role::where('role', 'ADMIN')->first()->users;
        $manager_users = Role::where('role', 'MANAGER')->first()->users;
        $super_admin_users = Role::where('role', 'SUPER-ADMIN')->first()->users;
    
        return view('users.index', array('viewer_users' => $viewer_users, 'admin_users'=>$admin_users, 'manager_users'=>$manager_users, 'super_admin_users'=>$super_admin_users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($roleName)
    {
        $roleInstance = Role::where('role', $roleName)->first();
        return view('users.create')->with(compact('roleInstance'));
    }
    //compact('tasks')
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $_POST['name'];
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $workingTabId = $request->get('working_tab');
        $user->save();

        $user_id = $user->id;

        $user->roles()->attach([$request->get('role_id')]);
      
        return redirect('users')->with('success', $user->name.' added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    { 
        return view('users.show', array('user' => $user)); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    { 
        return view('users.edit', array('user' => $user)); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone_no = $request->get('phone_no');

        $user->save();
     
      return redirect('users')->with('success', $user->name.' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $user = User::find($id);
        $user_name = $user->name;
        $roleName = $user->roles->first()->role;
        $workingTabId = $_POST['working_tab'];
        User::destroy($id);

        return back()->withInput(['tab'=>$workingTabId])->with('success', $roleName.' ' .$user_name.' deleted successfully!');
    }
}
