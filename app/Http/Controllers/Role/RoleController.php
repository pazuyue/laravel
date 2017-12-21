<?php
namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{

    /**
     * 显示角色列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roleList(){
        $roles = Role::all();
        return view('role.rolesmain',compact('roles'));
    }

}