<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Role;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mockery\Exception;


class UserController extends Controller
{
    /**
     * 显示用户列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userList(){
        $users = User::withTrashed()
            ->get();
        return view('users.usersmain',compact('users'));
    }

    /**
     * 用户删除
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userDel($id){
        $users = User::find($id);
        $users->delete();
        if($users->trashed()){
            return $this->userList();
        }else{
            throw new Exception("软删除失败！");
        }
    }

    /**
     * 用户软删除恢复失败
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userThaw($id){
        $users = User::onlyTrashed()->find($id);
        if($users->restore()){
            return $this->userList();
        }else{
             throw new Exception("软删除恢复失败！");
        }
    }

    /**
     * 显示添加用户页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userAddShow(){
        return view('users.useradd');
    }

    public function userAdd(StoreUserPost $request){

        $result=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        if($result){
            return $this->userList();
        }else{
            $errors=array("message"=>"错误信息","errors"=>array("save"=>"保存失败"));
            return new JsonResponse($errors, 422);
        }

    }

    /**
     * 显示用户修改页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userEditShow($id){
        $user=User::withTrashed()->findOrFail($id);
        return view('users.useredit', ['user' => $user]);
    }

    /**
     * 用户修改处理
     */
    public function userEdit(Request $request){
        $this->validate($request, [
            'id' => 'bail|required',
            'name' => 'bail|required|max:191',
            'email' => 'bail|required|email|max:191',
            'password' => 'bail|required|confirmed',
        ]);
        $user=User::withTrashed()->findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->password!=$request->password)
        {
            $user->password = $request->password;
        }
        $user->save();
        return $this->userList();
    }

    /**
     * 用户角色绑定页面显示
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userRoleShow($id){
        $user=User::find($id);
        $roles = Role::all();
        $hasroles=$user->roles;
        foreach ($roles as $key =>&$v)
        {
            $v->hasPermission =false;
            foreach ($hasroles as $row){
                if($row->id == $v->id){
                    $v->hasRole = true;
                }
            }
        }
        return view('users.userrole',['user' => $user,'roles'=>$roles]);
    }

    /**
     * 用户角色绑定
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userRole(Request $request){
        $this->validate($request, [
            'userID' => 'bail|required',
        ]);
        $user=User::findOrFail($request->userID);
        $result=$user->roles()->sync($request->roleID);
        if($result){
            return $this->userRoleShow($request->userID);
        }else{
            throw new Exception("用户角色绑定失败！");
        }
    }

}