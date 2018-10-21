@extends("layouts.main")
@section("title","注册页面")
@section("content")
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
            <label >分类</label>
            <select name="class_id"  class="form-control">
                <option value="">请选择分类</option>
                @foreach($rows as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>内容</label>
            <textarea class="form-control" rows="6" name="content">{{old("content")}}</textarea>
        </div>


        <button type="submit" class="btn btn-default">添加</button>
    </form>

@endsection

