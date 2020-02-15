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

Route::group(['middleware'=>'auth'], function(){
	Route::get('/home',function(){
		return view('welcome');
	});
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	
	Route::resource('user', 'UserController');
});

Route::get('/authenticated', function(){
	return 'another authenticated page';
})->middleware('guest');
// Route::get('/', function () {
// 	// //logic1
// 	dd(auth()->user());
// 	// DB::enableQueryLog();
// 	// $roles = Role::first();
// 	// dd($roles->permissions->first(),DB::getQueryLog());
//     return view('welcome');
// });

// Route::get('/second', "SecondController");
// Route::get('/payment/receive', "PaymentController@receive");
Route::get('/', function(){
	return 'Open Page';
});

Route::group(['namespace'=>'Auth'], function(){
	Route::get('login', 'LoginController@unauthenticatedPage')->name('login');
	Route::post('login', 'LoginController@login')->name('auth.login');
});


// Route::get('user', 'UserController@index');