<?php

use Illuminate\Database\Seeder;
use App\User;

class SuperAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Chetna Shahi';
        $user->email = 'chetna.shahi@netsolutions.com';
        $user->password = bcrypt('Admin1234');
        $user->dob = 'April 21';
        $user->save();
        $user_id = $user->id;

        $super_admin = User::find($user_id);
        $super_admin->roles()->attach([1]);
    }
}
