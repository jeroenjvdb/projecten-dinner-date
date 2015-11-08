@extends('master')

@section('title')
	register
@stop

@section('body')
	<div class="row">
	<h1>register</h1>
		
	@include('Auth.registerForm')
	</div>

@stop

@section('scripts')
	<script type="text/javascript">

	</script>
@stop