@extends("layouts.main")
@section("title","注册页面")
@section("content")
    <a href="javascript:history.go(-1)" class="btn btn-info">返回</a>
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>用户姓名</label>
            <input type="text" class="form-control"  placeholder="用户姓名" name="name" value="{{old("name")}}">
        </div>
        <div class="form-group">
            <label >密码</label>
            <input type="password" class="form-control" placeholder="用户密码" name="password" >
        </div>
        <div class="form-group">
            <label >确认密码</label>
            <input type="password" class="form-control" placeholder="确认密码" name="password_confirmation" >
        </div>
        <div class="form-group">
            <label>上传头像</label>
            <input type="file" name="img" >
        </div>

        <div class="form-group">
            <label  class=" ">验证码</label>
            <div class="">
                <input id="captcha" class="form-control " name="captcha" >
                <img class="thumbnail captcha" src="{{captcha_src('flat')}}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
            </div>
        </div>




        <button type="submit" class="btn btn-default">添加</button>
    </form>

@endsection

