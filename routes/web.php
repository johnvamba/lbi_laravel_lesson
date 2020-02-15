<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\RolesPermissions\Role;
use App\RolesPermissions\Permission;
use App\User;
use Illuminate\Support\Facades\DB;
Route::get('/', function () {
	// //logic1
	// DB::enableQueryLog();
	// $roles = Role::first();
	// dd($roles->permissions->first(),DB::getQueryLog());
    return view('welcome');
});

Route::get('/second', "SecondController");
Route::get('/payment/receive', "PaymentController@receive");

Route::resource('user', 'UserController');
// Route::get('user', 'UserController@index');