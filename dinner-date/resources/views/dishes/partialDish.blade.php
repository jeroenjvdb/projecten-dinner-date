@foreach($dishes as $dish)
<div class="partialDish">
	<div class="col-sm-2"><img src="{{ $dish->photo_url }}" alt="{{ $dish->name }}"> </div>
	<div class="col-sm-4 start-sentence">
		<h2>{{ $dish->name }}</h2>
		<p >{{ $dish->sDescription }}</p>
	</div>
</div>
@endforeach