<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            //数据加密

            $data['password']=Hash::make($data['password']);
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
  //修改
    public function edit(Request $request,$id){
        $user=User::find($id);
        $this->authorize('update', $user);
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
            return redirect()->route("user.index");

        }
        //显示视图
        return view("user.edit",compact('user'));
    }

    //用户登录
    public function login(Request $request){
        //判断接收方式
        if($request->isMethod('post')){
          $data=  $this->validate($request,[
                'name'=>'required',
                "password" => "required"

            ]);
            //验证密码与账号是否一致

            if( Auth::attempt( $data, $request->has( "remember"))){
                //登陆成功
                return redirect()->intended(route("user.index"))->with("success","登录成功");
            }else{
                //登录失败
                return redirect()->back()->withInput()->with("danger","账号或密码错误");
            }

        }
        //显示视图
        return view("user.login");
    }
    //退出登录
    public function logout(){
        Auth::logout();
        return redirect()->route("user.login");
    }
}
