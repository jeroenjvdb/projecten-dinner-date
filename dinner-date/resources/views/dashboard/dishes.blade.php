<h2>gerechten test</h2>

@foreach($profile->dishes as $dish)
	<div class="row dish">
		<div class="col-sm-4">
			<img src="{{ $dish->photo_url }}" alt="{{ $dish->name }}">
		</div>
		<div class="col-sm-8">
			<h3>{{ $dish->name }}</h3>
			<p>{{ $dish->sDescription }}</p>
		</div>
	</div>
@endforeach