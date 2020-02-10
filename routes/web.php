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

Route::get('/', function () {
    return view('welcome');
});
Route::get('register', 'AuthController@showRegisterForm')->name('register');
Route::post('register', 'AuthController@postRegister')->name('register');
// Auth::routes();
// Route::post()
Route::get('/home', 'HomeController@index')->name('home');


Route::get('fw/users', 'UserController@users');
Route::get('fw/users/customer', 'UserController@customerList');
Route::get('fw/users/admin', 'UserController@adminList');
Route::get('fw/roles', 'RoleController@roles');
Route::get('fw/roles/create', 'RoleController@createrole');
Route::post('fw/roles/create', 'RoleController@postcreaterole')->name('createrole');
// Route::get('fw/roles/edit/{roleId}', 'RoleController@editRole');
Route::get('fw/roles/edit/{roleId}', ['middleware' =>['permission:edit-role'],'uses'=>'RoleController@editRole']);
Route::post('fw/roles/edit/{roleId}', 'RoleController@updateRole')->name('updaterole');

#user routes
Route::get('/fw/users/create', 'UserController@createuser');
Route::post('/fw/users/create', 'UserController@storeuser');
Route::get('/fw/users/edit/{userId}', 'UserController@editUser');
Route::post('/fw/users/edit/{userId}', 'UserController@updateUser');
Route::get('success', 'AuthController@success');
Route::get('control', 'AuthController@control');
