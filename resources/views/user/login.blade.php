@extends("layouts.main")
@section("title","用户登录")
@section("content")

    <form action="" method="post" >
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

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> 记住密码
                    </label>
                </div>

        </div>

        <button type="submit" class="btn btn-default">登录</button>
    </form>

@endsection

