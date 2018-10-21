<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //注册
    public function reg(Request $request){
        //判断接收方式
        if($request->isMethod('post')){

        }
        //显示视图
        return view("user.reg");
    }
}
