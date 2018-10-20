@extends("layouts.main")
@section("title","分类添加")
@section("content")
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="form-group">


            <label>分类名称</label>
            <input type="text" class="form-control"  placeholder="商品分类" name="name" value="{{old("name")}}">
        </div>


        <button type="submit" class="btn btn-default">添加</button>
    </form>

@endsection

