<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\GoodsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //
    public function index( ){
        $goods=Goods::all();
        //显示视图
        return view('goods.index',compact('goods'));
    }
    //添加
    public function add(Request $request){
        //判断接收方式
        if($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required|min:1",
                "c_id"=>"required",
                "intro"=>"required",

            ]);
         if(Goods::create($request->post())){
             //判断添加成功
             session()->flash("success","添加成功");
             return redirect()->route("goods.index");
         }
        }
        //显示视图
        $rows=GoodsCategory::all();
        return view("goods.add",compact('rows'));
    }

    //编辑
    public function edit(Request $request,$id){
       //找到那条数据
        $good=Goods::find($id);
        //判断接收方式
        if($request->isMethod('post')){
            $this->validate($request,[
                "name"=>"required|min:1",
                "c_id"=>"required",
                "intro"=>"required",

            ]);
            if($good->update($request->post())){
                session()->flash("success","修改成功");
                return redirect()->route("goods.index");
            }

        }
        //显示视图
        $rows=GoodsCategory::all();
        return view("goods.edit",compact("good","rows"));
    }

    //查看
    public function look($id){

        //查看一次 添加浏览次数
        DB::table('goods')
            ->where('id', $id)
            ->increment('look_num', 1);
        $good=Goods::find($id);
        //显示视图
        return view('goods.look',compact("good"));
    }

    public function del($id ){
        $res=Goods::find($id);
        if($res->delete()){
            session()->flash("success","删除成功");
            return redirect()->route("goods.index");
        }
    }


}
