@extends("layouts.main")
@section("title","商品分类修改")
@section("content")
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="form-group">


            <label>分类名称</label>
            <input type="text" class="form-control"  placeholder="分类" name="name" value="{{$row->name}}">
        </div>


        <button type="submit" class="btn btn-default">修改</button>
    </form>

@endsection

