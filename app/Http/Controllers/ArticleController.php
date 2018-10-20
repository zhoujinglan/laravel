<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\AtricleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //
    public function index(){
        $articles = Article::paginate(3);
        //显示视图
        return view("article.index",compact("articles"));

    }

    public function add(Request $request){
        //判断接收方式
        if($request->isMethod("post")){
            //验证 内容不能为空
            $this->validate($request,[
                "name"=>"required|max:15",
                "author"=>"required",
                "content"=>"required",
                "class_id"=>"required",
            ]);
            if(Article::create($request->post())){
                //判断添加成功
                session()->flash("success","添加成功");
                return redirect()->route("article.index");
            }
        }
        //查询分类表
        $rows = DB::select('select * from atricle_categories');
        //dd($results);
        //显示视图

        return view("article.add",compact('rows'));
    }

    public function edit(Request $request,$id){
        //查找某一条数据
        $article=Article::find($id);
        $rows=AtricleCategory::all();
        //判断接收方式
        if($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required|max:15",
                "author"=>"required",
                "content"=>"required",
                "class_id"=>"required",
            ]);
            if($article->update($request->post())){
                //跳转
                session()->flash("success","修改成功");
                return redirect()->route("article.index");
            }
        }
        //显示视图
        return view("article.edit",compact("article","rows"));
    }
    //删除
    public function del($id ){
       $res=Article::find($id);
      if($res->delete()){
          session()->flash("success","删除成功");
          return redirect()->route("article.index");
      }
    }
}
