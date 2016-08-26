@extends('master')

@section('title')
	profile
@stop

@section('body')
@include('dashboard.picturesModal')
<h1 class="white font-size-50 margin-top-0">Profile</h1>
	<div class="jumbotron">
		<div class="row">
			<div class="col-sm-3 profile-pics" data-toggle="modal" data-target="#pictures">
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
									<img src="/{{ $image->picture_url}}"  />
								</div>
							</div>
							<div class="row more-pics">
								@else
									<div class="col-sm-3">
										<img src="/{{ $image->picture_url}}" />
									</div>
								@endif
								@endforeach
							</div>
						@endif
			</div>
			<div class="col-sm-8 col-sm-offset-1">
				<div class="row">
					<h1>{{ $profile->surname . " " . $profile->name }}
						<a class="green" href="{{ route('addFriend', array( $profile->id )) }}">
							{{--<button>send friendship request</button>--}}
							<i class="fa fa-heart" aria-hidden="true"></i>
						</a>
					</h1>
					<div class="col-sm-6">
						<h2>Info</h2>
						@if( $profile->age < 2000)
							<p>leeftijd: {!! $profile->age !!}
						@endif
							@if($profile->sex == 0)
									<br>man
							@else
									<br>vrouw
							@endif
						</p>
						<h3>Residence</h3>
						<p class="subheader">{{ $profile->country }} {{ $profile->city }}</p>
						<h3>About me</h3>
						<p>
							{!! $profile->about !!}
						</p>
					</div>
					<div class="col-sm-6">
						<h2>Date profile</h2>
						<h3>My perfect date</h3>
						<p id="perfectDate">
							@if($profile->perfectDate)
								{{ $profile->perfectDate }}
							@else
								Kaas en wijn onder een sterrenhemel
							@endif
						</p>
						<h3>My favorite diner</h3>
						<p id="favoriteDish">
							{{$profile->favoriteDish}}
						</p>

						<h3>My favorite restaurant</h3>
						<p>
							{{$profile->favRestaurant}}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="jumbotron">
		<div class="row">
			<h1>Food profile </h1>
			<div class="col-sm-offset-1 col-sm-11">
				@include('dashboard.foodprofile.tasteprofile')
				@include('dashboard.foodprofile.kitchen')
				@include('dashboard.foodprofile.allergies')
			</div>
		</div>
	</div>
	<div class="jumbotron">
		<div class="row">
			<h1>Dishes</h1>
			@include('dishes.partialDish')
			<center><a class="color-black" href="{{ route('personDishes', array( $profile->id )) }}">show all...</a></center>
		</div>
	</div>
		</div>
	</div>
@stop

@section('header')
	<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
@stop

@section('scripts')
	<script src="js/changeProfile.js"></script>
	{{--<script src="js/getChat.js"></script>--}}
@stop