@extends("layouts.main")
@section("title","文章")
@section("content")
<a href="{{route("class.add")}}" class="btn btn-info">添加</a>
<br/> <br/>
<table class="table table-bordered">
    <tr>
        <td>id</td>
        <td>分类</td>


        <td>操作</td>
    </tr>
    @foreach($categorys as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>

        <td>
            <a href="{{route("class.edit",$category->id)}}" class="btn btn-success">编辑</a>
            <a href="{{route("class.del",$category->id)}}" class="btn btn-danger">删除</a>

        </td>
    </tr>
        @endforeach
</table>
{{--{{$categorys->links()}}--}}
   @endsection