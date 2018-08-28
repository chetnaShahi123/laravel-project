<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'ADMIN-VIEW',
            'ADMIN-CREATE',
            'ADMIN-EDIT',
            'ADMIN-DELETE',
            'MANAGER-VIEW',
            'MANAGER-CREATE',
            'MANAGER-EDIT',
            'MANAGER-DELETE',
            'VIEWER-VIEW',
            'VIEWER-CREATE',
            'VIEWER-EDIT',
            'VIEWER-DELETE',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['permission' => $permission]);
       }

    }
}
