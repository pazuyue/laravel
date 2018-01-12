<?php
namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Permission;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * 显示角色列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissionList(){
        $permissions = Permission::withTrashed()
            ->paginate();
        return view('permission.permissionmain',compact('permissions'));
    }

    /**
     * 显示权限添加页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissionAddShow(){
        return view('permission.permissionadd');
    }

    /**
     * 添加权限
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissionAdd(Request $request){
        $this->validate($request, [
            'name' => 'bail|required|max:191',
            'display_name' => 'bail|required|max:191',
            'description' => 'bail|required|max:191',
        ]);
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        return $this->permissionList();
    }

    /**
     * 权限冻结
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     */
    public function permissionDel($id){
        $permission = Permission::find($id);
        $permission->delete();
        if($permission->trashed()){
            return $this->permissionList();
        }else{
            throw new Exception("软删除失败！");
        }
    }

    /**
     * 权限解冻
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     */
    public function permissionhaw($id){
        $permission = Permission::onlyTrashed()->find($id);
        if($permission->restore()){
            return $this->permissionList();
        }else{
            throw new Exception("软删除恢复失败！");
        }
    }

    /**
     * 权限修改显示页面
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissionEditShow($id){
        $permission=Permission::withTrashed()->findOrFail($id);
        return view('permission.permissionedit', ['permission' => $permission]);
    }

    /**
     * 权限修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissionEdit(Request $request){
        $this->validate($request, [
            'id' => 'bail|required',
            'name' => 'bail|required|max:191',
            'display_name' => 'bail|required|max:191',
            'description' => 'bail|required|max:191',
        ]);
        $role=Permission::withTrashed()->findOrFail($request->id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        return $this->permissionList();
    }

}