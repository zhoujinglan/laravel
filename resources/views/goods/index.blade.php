@extends("layouts.main")
@section("title","商品列表")
@section("content")
<a href="{{route("goods.add")}}" class="btn btn-info">添加</a>
<br/> <br/>
<table class="table table-bordered">
    <tr>
        <td>id</td>
        <td>商品名称</td>
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
        <td>{{$good->goods_category->name}}</td>
        <td>{{$good->price}}</td>
        <td>{{$good->intro}}</td>
        <td>
            <?php if($good['is_on_sale'] === 1){
                echo '上线';
            }else{
                echo "未上线";
            }
            ?>
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
{{--{{$categorys->links()}}--}}
   @endsection