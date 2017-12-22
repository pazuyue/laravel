<?php
namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Role;
use Exception;

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

}