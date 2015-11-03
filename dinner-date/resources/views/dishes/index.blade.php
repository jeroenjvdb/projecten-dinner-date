@extends('master')

@section('title')
	choose your dish
@stop

@section('body')
	@if(isset($dishes))
		
			@include('dishes.partialDish')
	@endif
@stop