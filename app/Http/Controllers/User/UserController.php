<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;


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
    public function userAdd(){
        return view('users.useradd');
    }

    public function userEditShow(){
        $user = Auth::user();
        return view('users.useredit',compact('user'));
}

}