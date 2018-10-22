@extends("layouts.main")
@section("title","用户首页")
@section("content")
{{--<a href="{{route("user.reg")}}" class="btn btn-info">用户注册</a>--}}
<br/> <br/>
<table class="table table-bordered">
    <tr>
        <td>id</td>
        <td>用户名</td>
        <td>密码</td>
        <td>头像</td>

        <td>操作</td>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->password}}</td>
        <td><img src="/{{$user->logo}}" alt="" width="80"></td>

        <td>

            <a href="{{route("user.edit",$user->id)}}" class="btn btn-success">编辑</a>
            <a href="{{route("user.del",$user->id)}}" class="btn btn-danger">删除</a>

        </td>
    </tr>
        @endforeach
</table>
{{--{{$categorys->links()}}--}}
   @endsection