<?php

use Illuminate\Database\Seeder;
use App\User;
use App\RolesPermissions\Permission;
use App\RolesPermissions\RolePermission;
use App\RolesPermissions\Role;
use App\RolesPermissions\TempPermission;
use Illuminate\Database\Eloquent\Model;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();

    	$role_user = factory(Role::class)->create([
    		'role' => 'User Manager'
    	]);

    	foreach (['add','edit', 'view', 'delete'] as $value) {
    		# code...
	    	$user = factory(Permission::class)->create([
	    		'permission' => $value,
	    		'group' => 'user'
	    	]);
	    	RolePermission::create([
	    		'role_id' => $role_user->id,
	    		'permission_id' => $user->id
	    	]);
    	}

		$role_loan = factory(Role::class)->create([
    		'role' => 'Loan Manager'
    	]);
    	foreach (['add','edit', 'view', 'delete'] as $value) {
    		# code...
	    	$load = factory(Permission::class)->create([
	    		'permission' => $value,
	    		'group' => 'loan'
	    	]);
	    	RolePermission::create([
	    		'role_id' => $role_loan->id,
	    		'permission_id' => $load->id
	    	]);
    	}


    	$user = User::first();

    	$second = User::skip(1)->first();
    	$user->roles()->sync(collect($role_loan->id, $role_user->id));
    	$second->roles()->sync($role_loan);
    	// TempPermission::create([
    	// 	'user_id' => $user->id,
    	// 	'permission_id' => $user_add->id,
    	// ]);

    	Model::reguard();
        // factory(User::class)->create();

        // factory(User::class)->create([
        // 	'username' => 'admin_user',
        // 	'first_name' => "Custom",
        // 	'last_name' => 'Admin',
        // ]);
    }
}
