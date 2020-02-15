<?php

namespace App\RolesPermissions;

use Illuminate\Database\Eloquent\Model;

class TempPermission extends Model
{
    protected $table="temp_permissions";

    public $timestamps = false;

    public $incrementing = false;

    public function user(){
    	return $this->belongsTo(\App\User::class);
    }

    public function permission(){
    	return $this->belongsTo(Permission::class);
    }
}
