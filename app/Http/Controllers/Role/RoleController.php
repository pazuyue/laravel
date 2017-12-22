<?php
namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
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

}