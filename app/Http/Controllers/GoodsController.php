<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\GoodsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //
    public function index(Request $request){
        $cateId = $request->get('class_id');
        $minPrice = $request->get('minPrice');
        $maxPrice = $request->get('maxPrice');
        $keyword = $request->get('keyword');
        //得到所有并要有分页
        $query=Goods::orderBy("id");

        if ($keyword!==null){

            $query->where("name","like","%{$keyword}%");
        }
        if($minPrice !== null  ){
            $query->where("price",">=",$minPrice);
        }
      if($maxPrice !== null){
            $query->where("price","<=",$maxPrice);
      }

        if ($cateId!==null){
            $query->where("c_id",$cateId);
        }

        $goods=$query->paginate(2);
        //$goods=Goods::all();
        $cates=GoodsCategory::all();
        //显示视图
        return view('goods.index',compact('goods','cates'));
    }
    //添加
    public function add(Request $request){
        //判断接收方式
        if($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required|min:1",
                "c_id"=>"required",
                "intro"=>"required",
                "img" => "required",
                "captcha" => "required|captcha"

            ]);
         //接收数据
            $data = $request->post();
            $file=$request->file('img');
            $data['logo']=$file->store('good_img','image');
            //添加
            Goods::create($data);
            //跳转
            return redirect()->route("goods.index")->with("success","添加成功");
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
            //接收数据
            $data = $request->post();
            if($data != null){
                $file=$request->file('img');
                $data['logo']=$file->store('good_img','image');

            }
            $good->update($data);
            session()->flash("success","修改成功");
            return redirect()->route("goods.index");


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
        //dd($res);exit;
        if($res->delete()){
            @unlink($res['logo']);
            session()->flash("success","删除成功");
            return redirect()->route("goods.index");
        }
    }


}
