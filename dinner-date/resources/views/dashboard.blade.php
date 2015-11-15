@extends('master')

@section('title')
	profile
@stop

@section('body')

@include('Auth/registerForm2')
@include('Auth/updateFood')
@include('Auth/updateProfile')


	<div class="row">
		<div class="col-sm-3 profile-pics">
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
		
			<div class="row">
				<div class="col-sm-offset-1"><a href="">meer..</a></div>
			</div>	
		</div>
		<div class="col-sm-8 col-sm-offset-1">
			
			<h1>
				{{ $profile->surname . " " . $profile->name }}
			</h1>
			@if(Auth::user()->id == $profile->id)
				<span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateProfile"></span>
			@endif 
			<h2>spicyness</h2>
			<h2> {{ $profile->spicyness }} </h2>
			<button>send friendship</button>
		</div>
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
			<p id="perfectDate">@if($profile->perfectDate)
{{ $profile->perfectDate }}
				@else
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum interdum feugiat. Maecenas aliquam ligula arcu, tristique accumsan nisi rutrum sed. Nullam nec magna pharetra, fermentum orci vestibulum, ornare quam. Pellentesque consectetur urna eget purus efficitur, in elementum leo euismod. Proin elit libero, luctus at ultrices id, gravida vitae massa. Morbi placerat dui ac est convallis rhoncus. 
				@endif
			</p>
			<h3>my all time favourites</h3>
			<input type="hidden" id="favDish" value="{{ $profile->favoriteDish }}" />
			<ul id="favoriteDish">
				@foreach($profile->favoriteDishArray as $dish)
					<li>{{ $dish }}</li>
				@endforeach
				
			</ul>
			<h3>smaken</h3>
			<ul>
				@foreach($profile->tastes as $taste)
					<li>{{ $taste->name }}  <span class="clickable glypicon glyphicon-remove"></span></li>
				@endforeach
				<li>zoet <span class="remove clickable glyphicon glyphicon-remove" id="taste-zoet"></span></li>
			</ul>
			<p>leeftijd: {!!$profile->dateOfBirth !!}</p>
			
			<p>details details details...</p>
			{!! Form::submit('submit', array('class' => 'invisible', 'id' => 'invisibleSubmit')) !!}
			{!! Form::close() !!}
		</div>
		
		<div>

		<div class="col-sm-8">
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation"><a href="#messages" aria-controls="people" role="tab" data-toggle="tab">people you may like</a></li>
	    <li role="presentation"><a href="#dishes" aria-controls="profile" role="tab" data-toggle="tab">dishes</a></li>
	    <li role="presentation"><a href="#chatbox" aria-controls="settings" role="tab" data-toggle="tab">chatbox</a></li>
	  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="people">
		people you may like
	</div>
    <div role="tabpanel" class="tab-pane" id="dishes">
		@include('dashboard.dishes')
    </div>
    <div role="tabpanel" class="tab-pane" id="chatbox">
		@include('dashboard.chatbox')
    </div>
  </div>

		@if(Auth::user())
			
			
		</div>
		@endif
	</div>
	




@stop

@section('header')
<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
@stop

@section('scripts')
	<script src="js/changeProfile.js"></script>
	<script src="js/getChat.js"></script>
@stop