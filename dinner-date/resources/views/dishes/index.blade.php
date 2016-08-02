@extends('master')

@section('title')
	{{ $dish->name }}
@endsection

@section('body')
	<h1 class="start-sentence">{{ $dish->name }}</br>
		<small class="start-sentence">{{$dish->user->fullName() }}</small>
	</h1>
	<div class="row">
		<div class="col-sm-6">
			<img class="img-responsive" src="{{ $dish->photo_url }}" alt="{{ $dish->name }}">
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-6"><h3>Duration: {{ $dish->duration }}</h3></div>
				<div class="col-sm-6"><h3>Difficulty: {{ $dish->difficulty }}</h3></div>
				<div class="col-sm-6"><h3>Rating: {{ round($dish->rating()) }}</h3></div>
				<div class="col-sm-6"><h3>I rate: 
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '1'))}}">1</a>
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '2'))}}">2</a>
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '3'))}}">3</a>
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '4'))}}">4</a>
						<a href="{{route('ratingCreate', array('dishId' => $dish->id, 'rating' => '5'))}}">5</a>
					</h3>
				</div>
			</div>

		@if($dish->url)
				<div id="player"></div>
		@endif
			<p><strong>{{ $dish->lDescription }}</strong></p>
		</div>
	</div>
	<div class="row">
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

	<script>
		// 2. This code loads the IFrame Player API code asynchronously.
		var tag = document.createElement('script');
		var url = "<?php echo $dish->url; ?>";
		tag.src = "<?php echo $dish->url; ?>";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		// 3. This function creates an <iframe> (and YouTube player)
		//    after the API code downloads.
		var player;
		function onYouTubeIframeAPIReady() {
			player = new YT.Player('player', {
				height: '390',
				width: '640',
				videoId: 'M7lc1UVf-VE',
				events: {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				}
			});
		}

		// 4. The API will call this function when the video player is ready.
		function onPlayerReady(event) {
			event.target.playVideo();
		}

		// 5. The API calls this function when the player's state changes.
		//    The function indicates that when playing a video (state=1),
		//    the player should play for six seconds and then stop.
		var done = false;
		function onPlayerStateChange(event) {
			if (event.data == YT.PlayerState.PLAYING && !done) {
				setTimeout(stopVideo, 6000);
				done = true;
			}
		}
		function stopVideo() {
			player.stopVideo();
		}
	</script>
@endsection

