<?php

namespace App\Http\Controllers;

use App\Models\GoodsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsCategoryController extends Controller
{
    //查看所有数据
    public function index( ){
        $categorys=GoodsCategory::all();
        //显示视图
        return view("category.index",compact("categorys"));
    }
    //添加
    public function add(Request $request){
        //判断接收方式
        if($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required|max:15|min:1",

            ]);
            if(GoodsCategory::create($request->post())){
                session()->flash("success","添加成功");
                return redirect()->route("category.index");
            }
        }
        //显示视图
        return view("category.add");
    }

    //修改
    public function edit(Request $request,$id){
        $row =GoodsCategory::find($id);
        //判断接收方式
        if($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required|max:15|min:3",

            ]);
            if($row->update($request->post())){
                session()->flash("success","修改成功");
                return redirect()->route("category.index");
            }
        }

        //显示视图
        return view("category.edit",compact("row"));
    }

    public function del($id ){
        $res=GoodsCategory::find($id);
        $num=DB::select("select count(*) from goods where c_id='{$id}'");
        //dd($num);

        if($num>0 ){

            session()->flash("warning","有商品的分类不能删除");
        }else{
            if($res->delete()){
                session()->flash("success","删除成功");

            }
        }
        return redirect()->back();
    }
}
