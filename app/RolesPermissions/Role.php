<?php

namespace App\RolesPermissions;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    public function permissions(){
    	return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
