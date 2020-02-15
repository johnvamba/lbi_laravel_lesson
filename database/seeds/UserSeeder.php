<?php

use Illuminate\Database\Seeder;
use App\User;
use App\RolesPermissions\Permission;
use App\RolesPermissions\Roles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 5)->create();
        // $users->each(function(){
        //     //manager
        // })
        factory(User::class)->create([
        	'username' => 'admin_user',
        	'first_name' => "Custom",
        	'last_name' => 'Admin',
        ]);
    }
}
