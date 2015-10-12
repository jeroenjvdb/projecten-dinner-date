<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document | @yield('title')</title>
	<script src="/js/jquery.js"></script>
	@yield('scripts')
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	@if(Auth::user())
		{{ Auth::user()->email }}
	@endif
	@yield('body')
</body>
</html>