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
            @if(Auth::guest())
                <a class="navbar-brand text-capitalize" href="{{ route('homepage') }}">home</a>
            @else
                <a class="navbar-brand text-capitalize" href="{{ route('dashboard') }}">home</a>
            @endif
        </div>

    @if(!Auth::guest())
        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-capitalize">
                    <!-- <li class="active"><a href="#"> link<span class="sr-only">(current)</span></a></li>-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dishes <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('dishIndex') }}">Dishes</a></li>
                            <li><a href="{{ route('myDishes') }}">My dishes</a></li>
                            <li><a href="{{ route('dishCreate') }}">Create dish</a></li>

                            {{--<li role="separator" class="divider"></li>--}}

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">date <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('createDate') }}">create date</a></li>
                            <li><a href="{{ route('myDates') }}">my dates</a></li>
                            <li><a href="{{ route('findDates') }}">search date</a></li>

                            {{--<li role="separator" class="divider"></li>--}}

                        </ul>
                    </li>
                    <li>
                        <a class="navbar-brand text-capitalize" href="{{ route('chat') }}">chat</a>
                    </li>
                    <li>
                        <a class="navbar-brand text-capitalize" href="{{ route('getRequests') }}">Daters</a>
                    </li>
                    <li>
                        <a class="navbar-brand text-capitalize" href="{{ route('compare') }}">compare</a>
                    </li>
                </ul>
                @endif

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        @if(Auth::user())
                            <a href="{{ route('dashboard') }}">
                                {{ Auth::user()->email }}
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                Login
                            </a>
                        @endif
                    </li>
                    @if(Auth::user())
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>