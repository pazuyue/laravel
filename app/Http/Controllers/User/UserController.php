<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\User;
use Illuminate\Http\JsonResponse;
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
        $user=User::findOrFail($id);
        return view('users.useredit', ['user' => $user]);
    }

    /**
     * 用户修改处理
     */
    public function userEdit(){

    }

}