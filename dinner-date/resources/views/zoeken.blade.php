@extends('master')

@section('title')
	zoeken
@stop

@section('body')
	<div class="row">
		<div class="col-sm-6">
			<img src="" alt="" />
		</div>
		<div class="col-sm-6">
			<h1>{{ "title" }}</h1>
			<div class="col-sm-6">
				<p>{{ 'difficulty' }}</p>
			</div>
			<div class="col-sm-6">
				<p>{{ 'duration' }}</p>
			</div>
			<p>{{ 'lDuration' }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<h2>Ingrediënten</h2>
			<p>{{ 'ingredients' }}</p>
			<h2>bereidingswijze</h2>
			<p>{{ 'preparation' }}</p>
			<h2>passende wijnen</h2>
			<p>{{ 'fittingWines' }}</p>
		</div>
	</div>
@stop