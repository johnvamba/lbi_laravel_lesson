<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('permission');
            $table->string('group');
        });

        Schema::create('roles',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('role');
        });
        //Descr
        Schema::create('role_permission', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');
        });
        
        Schema::create('temp_permissions', function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('permission_id');
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_permission');
        Schema::dropIfExists('temp_permissions');
        Schema::dropIfExists('user_roles');
    }
}
