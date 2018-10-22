@extends("layouts.main")
@section("title","商品列表")
@section("content")

    <div>
        <div class="col-sm-4">
            <a href="{{route("goods.add")}}" class="btn btn-info">添加</a>
        </div>
        <div>
            <form class="form-inline pull-right" method="get">
                <div class="form-group">

                    <select  name="class_id"  class="form-control">
                        <option value="">请选择商品分类</option>
                        @foreach($cates as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" size="5"  placeholder="最低价" name="minPrice">
                </div>
                -
                <div class="form-group">

                    <input type="text" class="form-control" size="5"  placeholder="最高价" name="maxPrice">
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" size="10"  placeholder="关键字" name="keyword">
                </div>

                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </form>
        </div>
    </div>
    <br><br>

<table class="table table-bordered">
    <tr>
        <td>id</td>
        <td>商品名称</td>
        <td>商品图片</td>
        <td>商品分类</td>
        <td>价格</td>
        <td>详情</td>
        <td>是否上架</td>
        <td>浏览次数</td>
        <td>操作</td>
    </tr>
    @foreach($goods as $good)
    <tr>
        <td>{{$good->id}}</td>
        <td>{{$good->name}}</td>
        <td><img src="/{{$good->logo}}" width="50" alt=""></td>
        <td>{{$good->goods_category->name}}</td>
        <td>{{$good->price}}</td>
        <td>{{$good->intro}}</td>
        <td>

            @if($good->is_on_sale)
                <i class="glyphicon glyphicon-ok" style="color:green"></i>
                @else
                <i class="glyphicon glyphicon-remove" style="color:red"></i>
            @endif
        </td>
        <td>{{$good->look_num}}</td>
        <td>
            <a href="{{route("goods.look",$good->id)}}" class="btn btn-warning">浏览</a>
            <a href="{{route("goods.edit",$good->id)}}" class="btn btn-success">编辑</a>
            <a href="{{route("goods.del",$good->id)}}" class="btn btn-danger">删除</a>

        </td>
    </tr>
        @endforeach
</table>
{{$goods->appends($url)->links()}}
   @endsection