<?php

namespace App\RolesPermissions;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
	public $table = 'user_roles';
	
    public function user(){
    	return $this->belongTo(\App\User::class);
    }

    public function role(){
    	return $this->belongTo(Role::class);
    }
}
