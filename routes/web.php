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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/addRole', 'HomeController@addRole')->name('home-addRole');
Route::get('/home/distributionRole', 'HomeController@distributionRole')->name('home-distributionRole');
Route::get('/home/addPermission', 'HomeController@addPermission')->name('home-addPermission');
Route::get('/home/hasRole', 'HomeController@hasRole')->name('home-hasRole');

Route::get('/user/usermain', 'User\UserController@userList')->name('user-userList');
Route::get('/user/useraddshow', 'User\UserController@userAddShow')->name('user-userAddShow');
Route::post('/user/useradd', 'User\UserController@userAdd')->name('user-userAdd');
Route::get('/user/useredit/{id}', 'User\UserController@userEditShow')->name('user-userEditShow');
Route::post('/user/useredit', 'User\UserController@userEdit')->name('user-userEdit');
Route::get('/user/useredel/{id}', 'User\UserController@userDel')->name('user-userDel');
Route::get('/user/userthaw/{id}', 'User\UserController@userThaw')->name('user-userThaw');


Route::get('/role/rolelist', 'Role\RoleController@roleList')->name('role-roleList');
Route::get('/role/roleedel/{id}', 'Role\RoleController@roleeDel')->name('role-roleeDel');
Route::get('/role/rolethaw/{id}', 'Role\RoleController@roleThaw')->name('role-roleThaw');
Route::get('/role/roleedit/{id}', 'Role\RoleController@roleEditShow')->name('role-roleEditShow');
Route::put('/role/roleedit', 'Role\RoleController@roleEdit')->name('role-roleEdit');
Route::get('/role/roleaddshow', 'Role\RoleController@roleAddShow')->name('role-roleAddShow');
Route::put('/role/roleadd', 'Role\RoleController@roleAdd')->name('role-roleAdd');


