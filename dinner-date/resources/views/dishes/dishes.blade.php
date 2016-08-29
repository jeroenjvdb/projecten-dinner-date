@extends('master')

@section('title')
	Dishes
@endsection

@section('body')
	<h1 class="white font-size-50 margin-top-0">
		@if(isset($my))
			My dishes
			@elseif(isset($name))
			<span class="text-capitalize">{{$name}}'s</span> dishes
		@else
			Dishes
		@endif
	</h1>
	<div class="jumbotron">
		<div class="row">
				<div class="row">
				<a href="{{ route('dishCreate') }}" class="btn btn-default bg-blue white font-size-18">
					Create a dish <i class="fa fa-plus fa-x1" aria-hidden="true"></i>
				</a>
				</div>
			@if(count($dishes)==0)
				<h2>There are no dishes to show for. </h2>
				@endif
			@foreach($dishes as $dish)
				<a class="color-black" href="{{'/dish/show/' .  $dish->id}}">
					<div class="col-sm-4 dish" dish-id="{{ $dish->id }}">
						<img src="{{ $dish->photo_url }}" class="img-responsive max-height-200" alt="{{ $dish->name }}">
						<h2>{{ $dish->name }}</h2>
						@for($i = 1; $i<6; $i++)
							{{--@if($dish->rating() == $i )--}}
								{{--Difficulty : {{ $i }}--}}
								{{--@endif--}}
						@endfor
					</div>
				</a>
			@endforeach
		</div>
		@if(count($dishes)==6)
		<div class="row blue">
			<center>{!! $dishes->render() !!}</center>
		</div>
	@endif
	</div>

	<h1>
		<a class="color-black" href="{{ URL::previous() }}">
			<small class="start-sentence">Back</small>
		</a>
	</h1>

@endsection