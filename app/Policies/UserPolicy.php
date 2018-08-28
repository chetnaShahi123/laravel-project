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
        $permitted = true;
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;

        $role1 = $user1->roles->first();
        $roleName1 = $role1->role; 

        if ($roleName !== 'SUPER-ADMIN') {
            $pemission_for_role = $roleName1 .'-VIEW';
            return $permitted = Role::find($roleId)->permissions->contains('permission', $pemission_for_role); 
        }

        return $permitted;
    }

    public function viewAdmin(User $user, User $user1)
    {  
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
       
    }

    public function viewViewer(User $user, User $user1)
    { 
        $role = $user->roles->first();
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'VIEWER-VIEW');
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function createAdmin(User $user, User $user1)
    { 
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'ADMIN-CREATE');
    }

    public function createManager(User $user, User $user1)
    {  
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'MANAGER-CREATE');
    }

    public function createViewer(User $user, User $user1)
    {  
        $role = $user->roles->first();
        $roleName = $role->role;
        $roleId = $role->pivot->role_id;
        return $permitted = Role::find($roleId)->permissions->contains('permission', 'VIEWER-CREATE');
    }
    

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

        if ($roleName !== 'SUPER-ADMIN') {
            $pemission_for_role = $roleName1 .'-EDIT';
            return $permitted = Role::find($roleId)->permissions->contains('permission', $pemission_for_role); 
        }
        return $permitted;  
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

        if ($roleName !== 'SUPER-ADMIN') {
            $pemission_for_role = $roleName1 .'-DELETE';
            return $permitted = Role::find($roleId)->permissions->contains('permission', $pemission_for_role); 
        }
        return $permitted;  
    }


}
