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
        $users = User::all();
        return view('users.usersmain',compact('users'));
    }

    /**
     * 添加用户
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function useradd(){
        return view('users.useradd');
    }

}