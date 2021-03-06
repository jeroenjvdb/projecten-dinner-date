@extends('master')

@section('title')
	choose your dish
@stop

@section('body')
	<h1>{{ $dish->name }}</br>
		<small>-{{ $dish->user->fullName() }}</small>
	</h1>
	<div class="row">
		<div class="col-sm-6">
			<img src="{{ $dish->photo_url }}" alt="{{ $dish->name }}">
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-6"><h3>duration: {{ $dish->duration }}</h3></div>
				<div class="col-sm-6"><h3>difficulty: {{ $dish->difficulty }}</h3></div>
				<div class="col-sm-6"><h3>rating: {{ $dish->rating() }}</h3></div>
				<div class="col-sm-6"><h3>I rate: 
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '1'))}}">1</a>
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '2'))}}">2</a>
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '3'))}}">3</a>
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '4'))}}">4</a>
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '5'))}}">5</a>
					</h3>
				</div>
			</div>
			<p><strong>{{ $dish->lDescription }}</strong></p>
		</div>
	</div>
	<div class="row"><div class="col-sm-offset-1 col-sm-10">
	<h2>ingredients</h2>
	<ul>
		@foreach($dish->ingredientArray as $ingredient)
			<li>{{ $ingredient }}</li>
		@endforeach
	</ul>
	<h2>preparation</h2>
	<p>{{ $dish->preparations }}</p>

	@if($dish->fittingDrinks)
		<h2>fitting drinks</h2>
		<p>{{ $dish->fittingDrinks }}</p>
	@endif
	</div></div>
	<?php 
		// echo '<pre>';
		// var_dump($dish);
	?>
@stop