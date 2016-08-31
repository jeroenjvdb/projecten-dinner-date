<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  @yield('header')
	<title>DinnerDate | @yield('title')</title>
	<script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome-4.6.3/css/font-awesome.min.css">

    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="/css/fontawesome-stars.css">
    {{--fonts--}}
    <link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    @yield('link')
    @yield('crop')
</head>
<body>
	<div>
    @include('nav')
  @yield('noContainer')
	<div class="container">
        <div class="col-md-offset-1 col-md-10">
        @if(Auth::check())
            {{--@if(count($errors) > 0)--}}
                {{--<div class="model error no-decoration">--}}
                    {{--<ul>--}}
                        {{--@foreach ($errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}

                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}
            @if(Session::get('success'))
                <div class="model success no-decoration">
                    <ul>
                        <li>{{ Session::get('success') }}</li>
                    </ul>
                </div>
            @endif
        @endif
            @yield('body')

        </div>
	</div>
</div>

{{--<div class="navbar navbar-default">--}}
  {{--<div class="container footer">--}}
    {{--<h4>&#9400; Created by Jeroen Van den Broeck &amp; Jonas Van Reeth</h4>--}}
  {{--</div>--}}
{{--</div>--}}


    @yield('scripts')
    @if(Auth::check())

        <script>
            var baseUrl = document.location.origin;
            $.ajax({
                type: 'get',
                url: 'http://dinner-date-jonasvr.c9users.io:80/unseen',
                success: function(data){
                    if(data > 0){
                        $('#message').removeClass('hide')
                    }
                }
            });
            setInterval(function() {
                $.ajax({
                    type: 'get',
                    url: location+'/unseen/',
                    success: function(data){
                        if(data > 0){
                            $('#message').removeClass('hide')
                        }
                    }
                });
            }, 5* 60000); //5 seconds

        </script>
    @endif
</body>
</html>