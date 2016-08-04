<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  @yield('header')
	<title>DinnerDate | @yield('title')</title>
	<script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    {{--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>--}}
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome-4.6.3/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div>
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
            <li><a href="{{ route('findDates') }}">search date</a></li>
            
            {{--<li role="separator" class="divider"></li>--}}
            
          </ul>
        </li>
          <li>
              <a class="navbar-brand text-capitalize" href="{{ route('chat') }}">chat</a>
          </li>
          <li>
              <a class="navbar-brand text-capitalize" href="{{ route('getRequests') }}">Friends</a>
          </li>
          <li>
              <a class="navbar-brand text-capitalize" href="{{ route('compare') }}">compare</a>
          </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li>
        	@if(Auth::user())
        		<a href="#">
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
  @yield('noContainer')
	<div class="container">
        @if(Auth::check())
            @if(count($errors) > 0)
                <div class="model error no-decoration">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>
            @endif
            @if(Session::get('success'))
                <div class="model success">
                    <ul>
                        <li>{{ Session::get('success') }}</li>
                    </ul>
                </div>
            @endif
        @endif
    @yield('body')
	</div>
</div>

<div class="navbar navbar-default navbar-fixed-bottom">
  <div class="container footer">
    <h4>&#9400; Created by Jeroen Van den Broeck &amp; Jonas Van Reeth</h4>
  </div>
</div>


    @yield('scripts')

</body>
</html>