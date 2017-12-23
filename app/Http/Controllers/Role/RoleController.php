<?php
namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * 显示角色列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roleList(){
        $roles = Role::withTrashed()
            ->get();
        return view('role.rolesmain',compact('roles'));
    }

    /**
     * 角色冻结
     * @param $id
     */
    public function roleeDel($id){
        $role = Role::find($id);
        $role->delete();
        if($role->trashed()){
            return $this->roleList();
        }else{
            throw new Exception("软删除失败！");
        }
    }

    /**
     * 角色解冻
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     */
    public function roleThaw($id){
        $role = Role::onlyTrashed()->find($id);
        if($role->restore()){
            return $this->roleList();
        }else{
            throw new Exception("软删除恢复失败！");
        }
    }

    /**
     * 显示角色修改页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roleEditShow($id){
        $role=Role::withTrashed()->findOrFail($id);
        return view('role.roleedit', ['role' => $role]);
    }

    /**
     * 角色修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roleEdit(Request $request){
        $this->validate($request, [
            'id' => 'bail|required',
            'name' => 'bail|required|max:191',
            'display_name' => 'bail|required|max:191',
            'description' => 'bail|required|max:191',
        ]);
        $role=Role::withTrashed()->findOrFail($request->id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        return $this->roleList();
    }

    /**
     * 角色添加显示页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roleAddShow(){
        return view('role.roleadd');
    }

    /**
     * 角色添加
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roleAdd(Request $request){
        $this->validate($request, [
            'name' => 'bail|required|max:191',
            'display_name' => 'bail|required|max:191',
            'description' => 'bail|required|max:191',
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        return $this->roleList();
    }

    /**
     * 显示权限列表
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissionRoleShow($id){
        $role=Role::withTrashed()->findOrFail($id);
        $haspermissions=$role->perms;
        $Permissions = Permission::all();
        foreach ($Permissions as $key =>&$v)
        {
            $v->hasPermission =false;
            foreach ($haspermissions as $row){
                if($row->id == $v->id){
                    $v->hasPermission = true;
                }
            }
        }
        return view('role.rolepermissionRole',['role' => $role,'permissions'=>$Permissions]);
    }

    /**
     * 角色权限绑定
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     */
    public function permissionRole(Request $request){
        $this->validate($request, [
            'roleID' => 'bail|required',
        ]);
        $role=Role::findOrFail($request->roleID);

        $result=$role->perms()->sync($request->permissionID);
        if($result){
            return $this->permissionRoleShow($request->roleID);
        }else{
            throw new Exception("角色权限绑定失败！");
        }
    }

}