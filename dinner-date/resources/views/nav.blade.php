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
                <a class="navbar-brand text-capitalize" href="{{ route('homepage') }}">
                    <img src="/img/logo.png" class="max-height-40 max-width-40" alt="">
                </a>
            @else
                <a class="navbar-brand text-capitalize" href="{{ route('dashboard') }}">
{{--                    <span class="{{(Request::is('home') ? 'nav-active' : '')}}">--}}
                        <img src="/img/logo.png" class="max-height-40 max-width-40" alt="">
                    {{--</span>--}}
                </a>
            @endif
        </div>

    @if(!Auth::guest())
        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-capitalize">
                    <!-- <li class="active"><a href="#"> link<span class="sr-only">(current)</span></a></li>-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle font-size-18" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="{{(Request::is('dish/*') ? 'nav-active' : '')}}">
                                Dishes
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('dishIndex') }}">Dishes</a></li>
                            <li><a href="{{ route('myDishes') }}">My dishes</a></li>
                            <li><a href="{{ route('dishCreate') }}">Create dish</a></li>

                            {{--<li role="separator" class="divider"></li>--}}

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle font-size-18" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="{{(Request::is('dates/*') ? 'nav-active' : '')}}">
                                date
                                <span class="caret"></span>
                            </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('findDates') }}">search date</a></li>
                            <li><a href="{{ route('myDates') }}">my dates</a></li>
                            <li><a href="{{ route('createDate') }}">create date</a></li>

                            {{--<li role="separator" class="divider"></li>--}}

                        </ul>
                    </li>
                    <li>
                        <a class="navbar-brand text-capitalize" href="{{ route('chat') }}">
                           <span class="{{(Request::is('chat') ? 'nav-active' : '')}}">
                               Daters
                               @if(!Request::is('chat'))
                                <i class="fa fa-envelope-o hide" id="message" aria-hidden="true"></i>
                               @endif
                           </span>
                        </a>
                    </li>
                    <li>
                        <a class="navbar-brand text-capitalize" href="{{ route('getRequests') }}">
                            <span class="{{(Request::is('daters/requests') ? 'nav-active' : '')}}"> Date requests</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle font-size-18" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="{{(Request::is('compare') || Request::is('random') ? 'nav-active' : '')}}">
                                Find me a
                                <span class="caret"></span>
                            </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('random') }}">date</a></li>
                            <li><a href="{{ route('compare') }}">dater</a></li>
                        </ul>
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