@extends("layouts.main")
@section("title","商品添加")
@section("content")
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>商品名称</label>
            <input type="text" class="form-control"  placeholder="商品名称" name="name" value="{{old("name")}}">
        </div>
        <div class="form-group">
            <label >价格</label>
            <input type="text" class="form-control" placeholder="价格" name="price" value="{{old("price")}}">
        </div>


        <div class="form-group">
            <label >是否上架:</label>
            <input type="radio" name="is_on_sale" value="1">是
            <input type="radio" name="is_on_sale" value="0">否
        </div>
        <div class="form-group">
            <label >分类</label>
            <select name="c_id"  class="form-control">
                <option value="">请选择商品分类</option>
                @foreach($rows as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>商品图片</label>
            <input type="file" name="img" >
        </div>

        <div class="form-group">
            <label>商品介绍</label>
            <textarea class="form-control" rows="6" name="intro">{{old("intro")}}</textarea>
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

