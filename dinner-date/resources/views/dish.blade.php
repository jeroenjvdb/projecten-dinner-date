@extends('master')

@section('title')
	dishes
@stop

@section('body')
	<div class="row">
		<div class="col-sm-6">
			<img src="{{ $dish->photo_url }}" alt="{{ $dish->name }}">
		</div>
		<div class="col-sm-6">
			<h1>{{ $dish->name }}</h1>
			<div class="col-sm-6">
				<p>{{ $dish->difficulty }}</p>
			</div>
			<div class="col-sm-6">
				<p>{{ $dish->duration }}</p>
			</div>
			<p>{{ $dish->lDescription }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<h2>Ingrediënten</h2>
			<p>{{ $dish->ingredients }}</p>
			<h2>bereidingswijze</h2>
			<p>{{ $dish->preparations }}</p>
			<h2>passende wijnen</h2>
			<p>{{ $dish->fittingDrinks}}</p>
		</div>
	</div>
@stop