@extends('master')

@section('title')
	profile
@stop

@section('body')

@include('Auth/updateFood')
@include('Auth/updateProfile')
@include('Auth/updateSmaak')


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
				<div class="col-sm-offset-1"><a href="">meer..</a></div>
			</div>	
		</div>
		<div class="col-sm-8 col-sm-offset-1">
			
			<h1>
				{{ $profile->surname . " " . $profile->name }}
				@if(Auth::user()->id == $profile->id)
					<span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateProfile"></span>
				@endif 
			</h1>
			<p>leeftijd: {!!$profile->dateOfBirth !!}</p>
			<h2>spicyness</h2>
			<h2> {{ $profile->spicyness }} </h2>
		</div>
	
	<div class="row">
		<div class="col-sm-4">
			<h2>profiel
			@if(Auth::user()->id == $profile->id)
				<span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateFood"></span>
			@endif 
			</h2>
			{!! Form::open() !!}
			<h3>mijn perecte (dinner) date</h3>
			<p id="perfectDate">
				@if($profile->perfectDate)
					{{ $profile->perfectDate }}
				@else
				Kaas en wijn onder een sterrenhemel
				@endif
			</p>
			<h3>my all time favourites</h3>
			<input type="hidden" id="favDish" value="{{ $profile->favoriteDish }}" />
			<ul id="favoriteDish">
				@foreach($profile->favoriteDishArray as $dish)
					<li>{{ $dish }}</li>
				@endforeach
			</ul>
			<h2>spicyness</h2>
			<h2> {{ $profile->spicyness }} </h2>
			<h3>smaken
				@if(Auth::user()->id == $profile->id)
					<span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateSmaak"></span>
				@endif
			</h3>
			<ul>
				@if($profile->tastes)
					@foreach($profile->tastes as $taste)
						<li>
							{{ $taste->tastes }}  
						</li>
					@endforeach
				@else
				<li>zoet</span></li>
				@endif
			</ul>
			
			
			<p>details details details...</p>
			{!! Form::submit('submit', array('class' => 'invisible', 'id' => 'invisibleSubmit')) !!}
			{!! Form::close() !!}
		</div>
	

		

		<div class="col-sm-8">
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation"><a href="#people" aria-controls="people" role="tab" data-toggle="tab">people you may like</a></li>
	    <li role="presentation"><a href="#dishes" aria-controls="dishes" role="tab" data-toggle="tab">dishes</a></li>
	    <li role="presentation"><a href="#chatbox" aria-controls="chatbox" role="tab" data-toggle="tab">chatbox</a></li>
	    <li role="presentation"><a href="#friendRequests" aria-controls="friendRequests" role="tab" data-toggle="tab">friend requests <span>{{ $friendRequests->count() }}</span></a></li>
	  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="people">
		@foreach($peoples as $people)
			{!! $people->name !!}
			{!! $people->surname !!}
			{!! $people->country !!}
			{!! $people->city !!}
			{!! $people->dateOfBirth !!}
			<br \>
		@endforeach
	</div>
    <div role="tabpanel" class="tab-pane" id="dishes">
		@include('dashboard.dishes')
    </div>
    <div role="tabpanel" class="tab-pane" id="chatbox">
		@include('dashboard.chatbox')
    </div>
    <div role="tabpanel" class="tab-pane" id="friendRequests">
		@foreach($friendRequests as $friendRequest)
			<div class="row">
				<div class="col-md-2">
					<img src="" alt="">
				</div>
				<div class="col-md-6">
					 {{$friendRequest->user->fullName()}}
				</div>
				<div class="col-md-2">
					<a href="{{ route('acceptFriend', [$friendRequest->user->id]) }}"><button>accept</button></a>
				</div>
				<div class="col-md-2">
					<a href="{{ route('deleteFriendRequest', [$friendRequest->user->id]) }}"><button>delete</button></a>
				</div>
			</div>
		@endForeach
    </div>
  </div>
</div>


	




@stop

@section('header')
<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
@stop

@section('scripts')
	<script src="js/changeProfile.js"></script>
	<script src="js/getChat.js"></script>
@stop