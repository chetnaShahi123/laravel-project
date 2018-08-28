<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::find(1);
        $super_admin->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12]); //attach specific to many to many

        $admin = Role::find(2);
        $admin->permissions()->attach([5,6,7,8,9,10,11,12]);

        $manager = Role::find(3);
        $manager->permissions()->attach([9,10,11]);

        $viewer = Role::find(4);
        $viewer->permissions()->attach([11]);
    }
}
