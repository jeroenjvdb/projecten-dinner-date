@extends('master')

@section('title')
	Dishes
@endsection

@section('body')
	<h1 class="white font-size-50 margin-top-0">
		@if(isset($my))
			My dishes
		@else
			Dishes
		@endif
	</h1>
	<div class="jumbotron">
		<div class="row">
			@foreach($dishes as $dish)
				<a class="color-black" href="{{'/dish/show/' .  $dish->id}}">
					<div class="col-sm-4 dish" dish-id="{{ $dish->id }}">
						<img src="{{ $dish->photo_url }}" class="img-responsive height-290" alt="{{ $dish->name }}">
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
		@if(count($dishes)==6)
		<div class="row blue">
			<center>{!! $dishes->render() !!}</center>
		</div>
	</div>
	@endif
@endsection