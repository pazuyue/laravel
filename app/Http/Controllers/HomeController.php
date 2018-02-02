<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * 添加角色
     */
    public function addRole()
    {
        $owner = new Role();
        $owner->name = 'owner';
        $owner->display_name = 'Project Owner';
        $owner->description = 'User is the owner of a given project';
        $owner->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator';
        $admin->description = 'User is allowed to manage and edit other users';
        $admin->save();
    }

    /**
     * 将角色绑定用户
     */
    public function distributionRole()
    {
        $admin = Role::where('id', '=', '2')->first();

        $user = Auth::user();
        //调用EntrustUserTrait提供的attachRole方法
        //$user->attachRole($admin); // 参数可以是Role对象，数组或id
        $user->roles()->attach(2); //只需传递id即可
        var_dump($user);
    }

    /**
     * 权限添加到角色
     */
    public function addPermission()
    {
        $owner = Role::where('id', '=', '1')->first();
        $admin = Role::where('id', '=', '2')->first();
        $createPost = new Permission();
        $createPost->name = 'create-post';
        $createPost->display_name = 'Create Posts';
        $createPost->description = 'create new blog posts';
        $createPost->save();

        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = 'Edit Users';
        $editUser->description = 'edit existing users';
        $editUser->save();

        $owner->attachPermission($createPost);
        //等价于 $owner->perms()->sync(array($createPost->id));

        $admin->attachPermissions(array($createPost, $editUser));
        //等价于 $admin->perms()->sync(array($createPost->id, $editUser->id));
        var_dump("SUCCESS");
    }

    /**
     * 检测权限
     */
    public function hasRole()
    {
        $permission=Route::currentRouteName();
        var_dump($permission);
       /* $user = Auth::user();
        //$hasRole=$user->hasRole('admin');
        $hasRole=$user->hasRole(['owner', 'admin'], true);
        var_dump($hasRole);

        $permission=$user->can('create-post');*/

    }
}
