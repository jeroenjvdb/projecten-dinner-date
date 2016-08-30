@extends('master')

@section('title')
	{{ $dish->name }}
@endsection

@section('body')
	<h1 class="start-sentence font-size-50 white margin-top-0">{{ $dish->name }}
		</br>
		<a class="color-black" href="{{ route('getProfile', $dish->user_id ) }}">
			<small class="start-sentence">{{$dish->user->fullName() }}</small>
		</a>
		@if(Auth::id() == $dish->user_id)
			-
			<a class="color-black" href="{{ route('editDish', $dish->id ) }}">
				<small><span class="clickable glyphicon glyphicon-pencil"></span></small>
			</a>
		-
			<a class="color-black" href="{{ route('deleteDish', $dish->id ) }}">
				<small><span class="clickable glyphicon glyphicon-remove"></span></small>
			</a>
		@endif
	</h1>
	<div class="jumbotron margin-bottom-30 row">
	<div class="row">
		<div class="row">
		</div>
		<div class="col-sm-4 height-290">
			<img class="max-height-290 width-320 img-responsive" src="{{ $dish->photo_url }}" alt="{{ $dish->name }}">
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
							<option value="1" {{($rating == 1 ? 'selected' :'' )}}>1</option>
							<option value="2" {{($rating == 2 ? 'selected' :'' )}}>2</option>
							<option value="3" {{($rating == 3 ? 'selected' :'' )}}>3</option>
							<option value="4" {{($rating == 4 ? 'selected' :'' )}}>4</option>
							<option value="5" {{($rating == 5 ? 'selected' :'' )}}>5</option>
						</select>
					</h3>
				</div>
				{{--<div class="row">--}}
					<div class="col-sm-6"><h3>Description:</h3></div>
					<div class="col-sm-6"><a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup">
							<img src="/img/fb_button.png" class="height-25 width-87" alt=""> </a></div>
					<div class="col-sm-12"><strong>{{ $dish->sDescription }}</strong></div>
				{{--</div>--}}
			</div>

		</div>
	</div>
	</div>

	<div class=" jumbotron row">
		<div class="col-sm-offset-0 col-sm-4">
			<h2>Ingredients</h2>
			<ul>
				@foreach($dish->ingredientArray as $ingredient)
					<li>{{ $ingredient }}</li>
				@endforeach
			</ul>
		</div>
		<div class="col-sm-offset-0 col-sm-8">
			<h2>Preparation</h2>
			<p>{{ $dish->preparations }}</p>

			@if($dish->fittingDrinks)
				<h2>Fitting wines</h2>
				<p>{{ $dish->fittingDrinks }}</p>
			@endif

		</div>
	</div>
	<h1><a class="color-black" href="{{ URL::previous() }}">
			<small class="start-sentence">Back</small>
		</a></h1>

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
