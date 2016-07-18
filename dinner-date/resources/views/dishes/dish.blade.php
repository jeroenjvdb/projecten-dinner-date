@extends('master')

@section('title')
	dishes
@stop

@section('body')
	<h1> dees is dish.blade.php</h1>
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
			<iframe width="420" height="345" src="https://www.youtube.com/embed/XGSy3_Czz8k">
			</iframe>
			<h2>Ingredients</h2>
			<p>{{ $dish->ingredients }}</p>
			<h2>Preparation</h2>
			<p>{{ $dish->preparations }}</p>
			<h2>Fitting wines</h2>
			<p>{{ $dish->fittingDrinks}}</p>
		</div>
	</div>
@stop