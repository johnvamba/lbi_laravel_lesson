<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\RolesPermissions\Role;
use App\RolesPermissions\Permission;

$factory->define(Role::class, function (Faker $faker) {
    return [
		'role' => $faker->word
    ];
});

$factory->define(Permission::class, function (Faker $faker) {
    return [
		'permission' => $faker->word,
		'group' => $faker->word,
        
    ];
});