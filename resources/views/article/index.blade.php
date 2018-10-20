@extends("layouts.main")
@section("title","文章")
@section("content")
<a href="{{route("article.add")}}" class="btn btn-info">添加</a>
<br/> <br/>
<table class="table table-bordered">
    <tr>
        <td>id</td>
        <td>文章名</td>
        <td>作者</td>
        <td>分类</td>
        <td>简介内容</td>

        <td>操作</td>
    </tr>
    @foreach($articles as $article)
    <tr>
        <td>{{$article->id}}</td>
        <td>{{$article->name}}</td>
        <td>{{$article->author}}</td>
        <td>{{$article->atricle_categories->name}}</td>
        <td>{{$article->content}}</td>
        <td>
            <a href="{{route("article.edit",$article->id)}}" class="btn btn-success">编辑</a>
            <a href="{{route("article.del",$article->id)}}" class="btn btn-danger">删除</a>

        </td>
    </tr>
        @endforeach
</table>
{{$articles->links()}}
   @endsection