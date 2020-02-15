<?php

namespace App\RolesPermissions;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
	public $table='role_permission';
	public $timestamps = false;
    public function role(){
    	return $this->belongsTo(Role::class);
    }

    public function permission(){
    	return $this->belongsTo(Permission::class);
    }
}
