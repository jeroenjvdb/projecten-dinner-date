@extends('master')

@section('title')
	{{ $dish->name }}
@endsection

@section('body')
	<h1 class="start-sentence">{{ $dish->name }}</br>
		<small class="start-sentence">{{$dish->user->fullName() }}</small>
	</h1>
	<div class="row">
		<div class="col-sm-6">
			<img src="{{ $dish->photo_url }}" alt="{{ $dish->name }}">
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-6"><h3>Duration: {{ $dish->duration }}</h3></div>
				<div class="col-sm-6"><h3>Difficulty: {{ $dish->difficulty }}</h3></div>
				<div class="col-sm-6"><h3>Rating: {{ round($dish->rating()) }}</h3></div>
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
	<div class="row">
		<div class="col-sm-offset-1 col-sm-10">
			<h2>Ingredients</h2>
			<ul>
				@foreach($dish->ingredientArray as $ingredient)
					<li>{{ $ingredient }}</li>
				@endforeach
			</ul>
			<h2>Preparation</h2>
			<p>{{ $dish->preparations }}</p>

			@if($dish->fittingDrinks)
				<h2>Fitting wines</h2>
				<p>{{ $dish->fittingDrinks }}</p>
			@endif
		</div>
	</div>
@endsection

