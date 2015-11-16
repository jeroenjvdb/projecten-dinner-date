@extends('master')

@section('body')

	<div class="row">
		
			<div class="col-sm-3 profile-pics">
			
			@if (count($images) === 0)
				<div class="row">
						<div class="col-sm-12">
							<img src="/img/no-pic.jpg" />
						</div>
					</div>
					<div class="row more-pics">
						<div class="col-sm-3">
							<img src="/img/no-pic.jpg" />
						</div>	
					</div>
			@else
				@foreach($images as $index => $image)
				@if($index==0)
					<div class="row">
						<div class="col-sm-12">
							<img src="{{ $image->picture_url}}" />
						</div>
					</div>
					<div class="row more-pics">
					@else
						<div class="col-sm-3">
							<img src="{{ $image->picture_url}}" />
						</div>	
					@endif
				@endforeach
				</div>
			@endif
			<div class="row">
				<div class="col-sm-offset-1"><a href="{{ route('Photo') }}">upload pic</a></div>
			</div>	
		</div>
		
		<div class="col-sm-8 col-sm-offset-1">
			
			<h1>
				{{ $profile->surname . " " . $profile->name }}
			</h1>

			<h2>spicyness</h2>
			<p>leeftijd: {!! $profile->age !!}</p>
			<p> @if($profile->sex == 0)
					man
				@else
					vrouw
				@endif
				</p>
			<h3>residence</h3>
			<h3 class="subheader">{{ $profile->country }} {{ $profile->city }}</h3>
		
			<a href="{{ route('addFriend', array( $profile->id )) }}"><button>send friendship request</button></a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<h2>profiel
			@if(Auth::user()->id == $profile->id)
				<span class="clickable glyphicon glyphicon-pencil" id="edit"></span>
			@endif 
			</h2>
			{!! Form::open() !!}
			<h3>mijn perecte (dinner) date</h3>
			<p id="perfectDate">@if($profile->perfectDate)
	{{ $profile->perfectDate }}
				@else
				Kaas en wijn onder een sterrenhemel
				@endif
			</p>
			<h3>my all time favourites</h3>
			<input type="hidden" id="favDish" value="{{ $profile->favoriteDish }}" />
			<ul id="favoriteDish">
				{{--@foreach($profile->favoriteDishArray as $dish)
					<li>{{ $dish }}</li>
				@endforeach--}}
				
			</ul>
			<h2>spicyness</h2>
			<h2> {{ $profile->spicyness }} </h2>
			<h3>smaken</h3>
			<ul>
				@foreach($profile->tastes as $taste)
					<li>{{ $taste->tastes }}  </li>
				@endforeach
				</ul>
			{!! Form::submit('submit', array('class' => 'invisible', 'id' => 'invisibleSubmit')) !!}
			{!! Form::close() !!}
		</div>
		
		<div>

		<div class="col-sm-8">
	  

  
    <div role="tabpanel" class="tab-pane" id="dishes">
		@include('dashboard.dishes')
    </div>
    	</div>
  </div>

		
	</div>
	

@stop