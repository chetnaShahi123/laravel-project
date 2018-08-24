<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Role;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user, User $user1)
    { 
        //echo"<pre>";print_r($user);die;
        $permitted = true;
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;

        $role1 = $user1->roles->first();
        $roleName1 = $role1->role; 
        //$roleId1 = $role1->pivot->role_id;

        if ($roleName !== 'SUPER-ADMIN') {
             //die($roleName1);
            $pemission_for_role = $roleName1 .'-VIEW';
            return $permitted = Role::find($roleId)->permissions->contains('permission', $pemission_for_role); 
        }
      // echo $permitted;die;
        return $permitted;
    }

    public function viewAdmin(User $user, User $user1)
    {  //$permitted = true;
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'ADMIN-VIEW');
    }

    public function viewManager(User $user, User $user1)
    { 
        $role = $user->roles->first();
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'MANAGER-VIEW');
       // return true;//
    }

    public function viewViewer(User $user, User $user1)
    { 
        $role = $user->roles->first();
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'VIEWER-VIEW');
    }


    public function createAdmin(User $user, User $user1)
    {  //$permitted = true;
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'ADMIN-CREATE');
    }

    public function createManager(User $user, User $user1)
    {  //$permitted = true;
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'MANAGER-CREATE');
    }

    public function createViewer(User $user, User $user1)
    {  //$permitted = true;
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'VIEWER-CREATE');
    }
    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create(User $user,User $user1)
    // {
    //     $permitted = true;
    //     $role = $user->roles->first();
    //     $roleName = $role->role;
    //     $roleId = $role->pivot->role_id;

    //     $role1 = $user1->roles->first();
    //     $roleName1 = $role1->role; 

    //     if ($roleName !== 'SUPER-ADMIN') {
    //          //die($roleName1);
    //         $pemission_for_role = $roleName1 .'-CREATE';
    //         return $permitted = Role::find($roleId)->permissions->contains('permission', $pemission_for_role); 
    //     }
    
    //     return $permitted;  
    // }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user, User $user1)
    {
        $permitted = true;
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;

        $role1 = $user1->roles->first();
        $roleName1 = $role1->role; 
        //$roleId1 = $role1->pivot->role_id;

        if ($roleName !== 'SUPER-ADMIN') {
             //die($roleName1);
            $pemission_for_role = $roleName1 .'-EDIT';
            return $permitted = Role::find($roleId)->permissions->contains('permission', $pemission_for_role); 
        }
      // echo $permitted;die;
        return $permitted;  ////
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user, User $user1)
    {
        $permitted = true;
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;

        $role1 = $user1->roles->first();
        $roleName1 = $role1->role; 
        //$roleId1 = $role1->pivot->role_id;

        if ($roleName !== 'SUPER-ADMIN') {
             //die($roleName1);
            $pemission_for_role = $roleName1 .'-DELETE';
            return $permitted = Role::find($roleId)->permissions->contains('permission', $pemission_for_role); 
        }
        return $permitted;  
    }

    public function is_allowed_to_add_roles(User $user, User $ff) { die("hj");
echo"<pre>";print_r($user);echo $role;die;
    }
    // public function before($user, $ability)
    // {
    //     if ($user->isSuperAdmin()) {
    //         return true;
    //     }
    // }

}
