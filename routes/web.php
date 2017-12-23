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
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/addRole', 'HomeController@addRole')->name('home-addRole');
Route::get('/home/distributionRole', 'HomeController@distributionRole')->name('home-distributionRole');
Route::get('/home/addPermission', 'HomeController@addPermission')->name('home-addPermission');
Route::get('/home/hasRole', 'HomeController@hasRole')->name('home-hasRole');*/

Auth::routes();



Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/usermain', 'User\UserController@userList')->name('user-userList');
Route::get('/user/useraddshow', 'User\UserController@userAddShow')->name('user-userAddShow');
Route::post('/user/useradd', 'User\UserController@userAdd')->name('user-userAdd');
Route::get('/user/useredit/{id}', 'User\UserController@userEditShow')->name('user-userEditShow');
Route::post('/user/useredit', 'User\UserController@userEdit')->name('user-userEdit');
Route::get('/user/useredel/{id}', 'User\UserController@userDel')->name('user-userDel');
Route::get('/user/userthaw/{id}', 'User\UserController@userThaw')->name('user-userThaw');
Route::get('/user/userrole/{id}', 'User\UserController@userRoleShow')->name('user-userRoleShow');
Route::put('/user/userrole', 'User\UserController@userRole')->name('user-userRoleShow');

Route::get('/role/rolelist', 'Role\RoleController@roleList')->name('role-roleList');
Route::get('/role/roleedel/{id}', 'Role\RoleController@roleeDel')->name('role-roleeDel');
Route::get('/role/rolethaw/{id}', 'Role\RoleController@roleThaw')->name('role-roleThaw');
Route::get('/role/roleedit/{id}', 'Role\RoleController@roleEditShow')->name('role-roleEditShow');
Route::put('/role/roleedit', 'Role\RoleController@roleEdit')->name('role-roleEdit');
Route::get('/role/roleaddshow', 'Role\RoleController@roleAddShow')->name('role-roleAddShow');
Route::put('/role/roleadd', 'Role\RoleController@roleAdd')->name('role-roleAdd');
Route::get('/role/permissionrole/{id}', 'Role\RoleController@permissionRoleShow')->name('role-permissionRoleShow');
Route::put('/role/permissionrole', 'Role\RoleController@permissionRole')->name('role-permissionRole');



Route::get('/permission/permissionlist', 'Permission\PermissionController@permissionList')->name('permission-permissionList');
Route::get('/permission/permissionadd', 'Permission\PermissionController@permissionAddShow')->name('permission-permissionAddShow');
Route::put('/permission/permissionadd', 'Permission\PermissionController@permissionAdd')->name('permission-permissionAdd');
Route::get('/permission/permissiondel/{id}', 'Permission\PermissionController@permissionDel')->name('Permission-permissionDel');
Route::get('/permission/permissionhaw/{id}', 'Permission\PermissionController@permissionhaw')->name('Permission-permissionhaw');
Route::get('/permission/permissionedit/{id}', 'Permission\PermissionController@permissionEditShow')->name('Permission-permissionEditShow');
Route::put('/permission/permissionedit', 'Permission\PermissionController@permissionEdit')->name('Permission-permissionEdit');


