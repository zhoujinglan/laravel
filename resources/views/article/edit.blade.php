@extends("layouts.main")
@section("title","文章添加")
@section("content")
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label>文章名称</label>
            <input type="text" class="form-control"  placeholder="标题" name="name" value="{{$article->name}}">
        </div>
        <div class="form-group">
            <label >作者</label>
            <input type="text" class="form-control" placeholder="作者" name="author" value="{{$article->author}}">
        </div>
        <div class="form-group">
            <label >分类</label>
            <select name="class_id"  class="form-control">
                <option value="">请选择分类</option>
             @foreach($rows as $row)
                <option value="{{$row->id}}" <?php if($row['id']===$article['class_id']) echo 'selected'?>>{{$row->name}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>内容</label>
            <textarea class="form-control" rows="6" name="content">{{$article->content}}</textarea>
        </div>


        <button type="submit" class="btn btn-default">修改</button>
    </form>

@endsection

