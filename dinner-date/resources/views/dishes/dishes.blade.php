@extends('master')

@section('body')
	<div class="row">
		@foreach($dishes as $dish)
			<div class="col-sm-4 dish" dish-id="{{ $dish->id }}">
				<img src="{{ $dish->photo_url }}" alt="{{ $dish->name }}">
				<h2>{{ $dish->name }}</h2>
				@for($i = 1; $i<6; $i++)
					@if($dish->rating() >= $i )
						full
					@else
						empty
					@endif
				@endfor
			</div>
		@endforeach
	</div>
@stop

@section('scripts')
	<script>
		$(document).ready(function(){
			$('.dish').on('click', function(data){
				// console.log($(this));
				console.log($(this).attr('dish-id'));
				id = $(this).attr('dish-id');
				
				window.location.href = '/dish/show/' + id;
			});
		});
	</script>
@stop