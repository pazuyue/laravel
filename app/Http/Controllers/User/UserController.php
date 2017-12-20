<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;



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

    public function userDel($id){
        $users = User::find($id);
        $users->delete();
        if($users->trashed()){

            return $this->userList();
        }else{
            echo '软删除失败！';
        }
    }

    /**
     * 添加用户
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userAdd(){
        return view('users.useradd');
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