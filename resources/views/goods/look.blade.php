@extends("layouts.main")
@section("title","查看商品")
@section("content")
<a href="{{route("goods.index")}}" class="btn btn-info">返回首页</a>
<br/> <br/>
<table class="table table-bordered">
       <tr> <td>id</td><td>{{$good->id}}</td></tr>

    <tr><td>商品名称</td> <td>{{$good->name}}</td></tr>

    <tr><td>商品分类</td> <td>{{$good->goods_category->name}}</td></tr>

    <tr><td>价格</td><td>{{$good->price}}</td></tr>

    <tr><td>详情</td><td>{{$good->intro}}</td></tr>

    <tr>
        <td>是否上架</td><td>
            <?php if($good['is_on_sale'] === 1){
                echo '上线';
            }else{
                echo "未上线";
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>浏览次数</td> <td>{{$good->look_num}}</td>
    </tr>





</table>
{{--{{$categorys->links()}}--}}
   @endsection