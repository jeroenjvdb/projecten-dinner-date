@extends('master')

@section('title')
	{{ $dish->name }}
@endsection

@section('body')
	<h1 class="start-sentence font-size-50 white margin-top-0">{{ $dish->name }}
		@if(Auth::id() == $dish->user_id)
		{{--<a class="color-black" href="{{ route('editDish', $dish->id ) }}">--}}
		{{--<span class="clickable glyphicon glyphicon-pencil"></span>--}}
		{{--</a>--}}
		{{--<a class="color-black" href="{{ route('deleteDish', $dish->id ) }}">--}}
		{{--<span class="clickable glyphicon glyphicon-remove"></span>--}}
		{{--</a>--}}
		@endif
		</br>
		<a class="color-black" href="{{ route('getProfile', $dish->user_id ) }}">
			<small class="start-sentence">{{$dish->user->fullName() }}</small>
		</a> -
		<a class="color-black" href="{{ URL::previous() }}">
			<small class="start-sentence">Back</small>
		</a>
	</h1>
	<div class="jumbotron row">
	<div class="row">
		<div class="row">
			{{--<a class="btn btn-default bg-blue white font-size-18" href="{{ URL::previous() }}">Back</a>--}}
		</div>
		<div class="col-sm-4 height-290">
			<img class="height-290 width-320 img-responsive" src="{{ $dish->photo_url }}" alt="{{ $dish->name }}">
		</div>
		<div class="col-sm-8">
			<div class="row">
				<div class="col-sm-6"><h3>Duration: {{ $dish->duration }}</h3></div>
				<div class="col-sm-6"><h3>Difficulty: {{ $dish->difficulty }}</h3></div>
				<div class="col-sm-6"><h3>Rating:
						<select id="rating">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select></h3></div>
				<div class="col-sm-6"><h3>Rate:
						<select id="example">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</h3>
				</div>
				<div class="col-sm-12"><h3>Description:</h3>

					<p><strong>{{ $dish->sDescription }}</strong></p>
				</div>
			</div>

		</div>
	</div>
	</div>

	<div class=" jumbotron row">
		<div class="col-sm-offset-1 col-sm-3">
			<h2>Ingredients</h2>
			<ul>
				@foreach($dish->ingredientArray as $ingredient)
					<li>{{ $ingredient }}</li>
				@endforeach
			</ul>
		</div>
		<div class="col-sm-8">
			<h2>Preparation</h2>
			<p>{{ $dish->preparations }}</p>

			@if($dish->fittingDrinks)
				<h2>Fitting wines</h2>
				<p>{{ $dish->fittingDrinks }}</p>
			@endif

		</div>
	</div>
@endsection
@section('scripts')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="/js/jquery.barrating.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#example').barrating({
				theme: 'fontawesome-stars'
			});
			var rating = "<?php echo round($dish->rating()) ?>"
			$('#rating').barrating({
				theme: 'fontawesome-stars'
			});
			$('#rating').barrating('set', rating);

			$('#example').change(function(){
				var dishid = "<?php echo $dish->id ?>"
				var location ='/dish/show/'+dishid+'/rate/'+this.value;
				window.location.href = location;
			});
		});
	</script>
@endsection
