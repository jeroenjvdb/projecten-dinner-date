<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  @yield('header')
	<title>Document | @yield('title')</title>
	<script src="/js/jquery.js"></script>
  <script src="/js/bootstrap.js"></script>
  @yield('scripts')
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
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
      <a class="navbar-brand" href="{{ route('homepage') }}">home</a>
      @else
        <a class="navbar-brand" href="{{ route('dashboard') }}">home</a>
      @endif
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#"> link<span class="sr-only">(current)</span></a></li>-->
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dishes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('dishIndex') }}">Alle dishes</a></li>
            <li><a href="{{ route('dishCreate') }}">Dish aanmaken</a></li>
            
            <li role="separator" class="divider"></li>
            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">date <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('createDate') }}">maak een date</a></li>
            <li><a href="{{ route('findDates') }}">date zoeken</a></li>
            
            <li role="separator" class="divider"></li>
            
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li>
        	@if(Auth::user())
        		<a href="#">
					{{ Auth::user()->email }}
				</a>
			@else
				<a href="{{ route('login') }}">
					aanmelden
				</a>
			@endif
		</li>
		@if(Auth::user())
			<li><a href="{{ route('logout') }}">afmelden</a></li>
		@endif
        {{-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> --}}
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  @yield('noContainer')
	<div class="container">
    @if(count($errors) > 0)
          <div class="model error">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                 {{--  @if($success)
                    <li>{{ $success }}</li>
                  @endif --}}
                  
              </ul>
          </div>
      @endif
		@yield('body')
	</div>
</div>
</body>
</html>