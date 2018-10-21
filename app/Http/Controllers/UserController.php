<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //注册
    public function reg(Request $request){
        //判断接收方式
        if($request->isMethod('post')){
          $this->validate($request,[
             'name'=>'required|unique:users',
             "password" => "required|min:6|confirmed",
             "captcha"=>"required|captcha"
         ]);
          //接收数据
            $data = $request->post();
            //上传图片
            $file = $request->file('img');
            $data['logo']=$file->store('img','image');
            //添加
          User::create($data);
          //跳转
            return redirect()->route('user.index')->with("success","注册成功");
        }
        //显示视图
        return view("user.reg");
    }
    //显示列表
    public function index( ){
        $users=User::all();
        //显示视图
        return view("user.index",compact("users"));
    }

    public function edit(Request $request,$id){
        $user=User::find($id);

        //判断接收方式
        if($request->isMethod("post")){
            $this->validate($request,[
                'name'=>'required|unique:users',
                "password" => "required|min:6|confirmed",
                "captcha"=>"required|captcha"
            ]);
            //接收数据
            $data = $request->post();
            if($data != null){
                $file=$request->file('img');
                $data['logo']=$file->store('good_img','image');

            }
            $user->update($data);
            session()->flash("success","修改成功");
            return redirect()->route("goods.index");

        }
        //显示视图
        return view("user.edit",compact('user'));
    }
}
