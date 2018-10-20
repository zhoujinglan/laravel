<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">哎哟喂博客</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route("article.index")}}">文章首页 <span class="sr-only">(current)</span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">简介 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">稀奇</a></li>
                        <li><a href="#">八怪</a></li>
                        <li><a href="#">毒鸡汤</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其他的破玩意</a></li>

                    </ul>
                </li>
                <li class="active"><a href="{{route("class.index")}}">文章分类</a></li>
                <li><a href="{{route("category.index")}}">商品分类</a></li>
                <li><a href="{{route("goods.index")}}">商品列表</a></li>
            </ul>
            {{--<form class="navbar-form navbar-left">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-default">Submit</button>--}}
            {{--</form>--}}


            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">考虑登录呗</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">你的资料在这 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">个人资料</a></li>
                        <li><a href="#"> 退出登录</a></li>



                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>