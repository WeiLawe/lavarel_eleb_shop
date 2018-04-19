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
            <a class="navbar-brand" href="#">店铺管理系统</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li ><a href="/">首页 <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('help') }}">帮助</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">店铺管理<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        {{--<li><a href="{{route('stores.index') }}">查看店铺</a></li>--}}
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('stores.create') }}">注册</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('about')}}"><span class="glyphicon glyphicon-info-sign"></span>关于我们</a></li>
                {{--@guest--}}
                {{--<li><a href="{{route('login')}}">登陆</a></li>--}}
                {{--@endguest--}}
                {{--@auth--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user">{{\Illuminate\Support\Facades\Auth::user()->name}}</span> <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li align="center"><img src="@if(\Illuminate\Support\Facades\Auth::user()->head){{ \Illuminate\Support\Facades\Auth::user()->head }}@endif" class="img-circle img-circle" style="height:80px;width: 80px"></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="#">Another action</a></li>--}}
                        {{--<li><a href="#">Something else here</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li>--}}
                            {{--<form method="post" action="{{route('logout')}}">--}}
                                {{--<button class="btn btn-link btn-block">注销</button>--}}
                                {{--{{method_field('DELETE')}}--}}
                                {{--{{csrf_field()}}--}}
                            {{--</form>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--@endauth--}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

