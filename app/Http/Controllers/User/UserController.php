<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;


class UserController extends Controller
{
    public function userList(){
        $users = User::all();
        return view('users.usersmain',compact('users'));
        //return view('users.usersmain')->with(compact('users'));
    }

}