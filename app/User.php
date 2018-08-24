<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
Use App\Models\Role;
// Use App\Models\Admin;
// Use App\Models\Manager;
// Use App\Models\Viewer;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimeStamps();
    }

    // public function admin(){
    //     return $this->hasOne(Admin::class, 'user_email', 'email');
    // }

}
