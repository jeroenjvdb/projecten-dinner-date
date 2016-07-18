@extends('master')

@section('body')
	<div class="row">
		@foreach($dishes as $dish)
			<a href="{{'/dish/show/' .  $dish->id}}">
				<div class="col-sm-4 dish" dish-id="{{ $dish->id }}">
					<img src="{{ $dish->photo_url }}" class="img-responsive max-height-290" alt="{{ $dish->name }}">
					<h2>{{ $dish->name }}</h2>
					@for($i = 1; $i<6; $i++)
						@if($dish->rating() == $i )
							Difficulty : {{ $i }}
							@endif
					@endfor
				</div>
			</a>
		@endforeach
	</div>
@endsection