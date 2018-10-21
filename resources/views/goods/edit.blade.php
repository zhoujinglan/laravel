@extends("layouts.main")
@section("title","商品修改")
@section("content")
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>商品名称</label>
            <input type="text" class="form-control"  placeholder="商品名称" name="name" value="{{$good->name}}">
        </div>
        <div class="form-group">
            <label >价格</label>
            <input type="text" class="form-control" placeholder="价格" name="price" value="{{$good->price}}">
        </div>


        <div class="form-group">
            <label >是否上架:</label>
            <input type="radio" name="is_on_sale" value="1" <?php if($good['is_on_sale']=== 1)echo 'checked'?>>是
            <input type="radio" name="is_on_sale" value="0" <?php if($good['is_on_sale']=== 0)echo 'checked'?>>否
        </div>
        <div class="form-group">
            <label >分类</label>
            <select name="c_id"  class="form-control">
                <option value="">请选择商品分类</option>
                @foreach($rows as $row)
                <option value="{{$row->id}}" <?php if($row['id'] === $good['c_id']) echo 'selected';?>>{{$row->name}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>商品介绍</label>
            <textarea class="form-control" rows="6" name="intro">{{$good->intro}}</textarea>
        </div>
        <div class="form-group">
            <label>商品图片</label>
            <input type="file" name="img" >
            <img src="/{{$good->logo}}" width="60" alt="">
        </div>

        <button type="submit" class="btn btn-default">修改</button>
    </form>

@endsection

