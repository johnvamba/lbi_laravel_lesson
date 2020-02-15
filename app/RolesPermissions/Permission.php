<?php

namespace App\RolesPermissions;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	// protected $fillable =[ ''];
	// protected $guarded = [];
    public $timestamps = false;

    public function roles(){
    	return $this->belongsToMany(Role::class, 'role_permission');
    }
}
