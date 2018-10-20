<?php

namespace App\Http\Controllers;

use App\Models\AtricleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtricleCategoryController extends Controller
{
    //
    public function index( ){
        $categorys=AtricleCategory::all();
        //显示视图
        return view("class.index",compact("categorys"));

    }
    //添加
    public function add(Request $request){
      //判断接收方式
        if($request->isMethod('post')){
            $this->validate($request,[
                "name"=>"required|max:15|min:3",

            ]);
            if(AtricleCategory::create($request->post())){
                session()->flash("success","添加成功");
                return redirect()->route("class.index");
            }
        }
        //显示视图
        return view("class.add");

    }

    //修改
    public function edit(Request $request,$id){
        $row =AtricleCategory::find($id);
        //判断接收方式
        if($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required|max:15|min:3",

            ]);
            if($row->update($request->post())){
                session()->flash("success","修改成功");
                return redirect()->route("class.index");
            }
        }

        //显示视图
        return view("class.edit",compact("row"));
    }

    public function del($id ){
        $res=AtricleCategory::find($id);

        $num=DB::select("select count(*) from articles where class_id='{$id}'");
        //dd($num);

           if($num>0 ){

               session()->flash("warning","有文章的分类不能删除");
           }else{
               if($res->delete()){
                   session()->flash("success","删除成功");

               }
        }
        return redirect()->back();
    }
}
