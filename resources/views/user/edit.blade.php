@extends("layouts.main")
@section("title","注册页面")
@section("content")
    <a href="javascript:history.go(-1)" class="btn btn-info">返回</a>
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>用户姓名</label>
            <input type="text" class="form-control"  placeholder="用户姓名" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label >密码</label>
            <input type="text" class="form-control" placeholder="用户密码" name="password" value="{{$user->password}}" >
        </div>

        <div class="form-group">
            <label>上传头像</label>
            <input type="file" name="img" >
            <img src="/{{$user->logo}}" width="60" alt="">
        </div>


        <button type="submit" class="btn btn-default">添加</button>
    </form>

@endsection

