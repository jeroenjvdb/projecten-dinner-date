<div class="row">
	@foreach($dishes as $dish)
	<div class="partialDish col-sm-6 min-height-250">
		<a class="color-black" href="{{'/dish/show/' .  $dish->id}}">
			<div class="col-sm-4"><img class="img-responsive" src="{{ $dish->photo_url }}" alt="{{ $dish->name }}"> </div>
			<div class="col-sm-8">
				<h2>{{ $dish->name }}</h2>
				<p class="color-black" >{{ $dish->sDescription }}</p>
			</div>
		</a>
	</div>
	@endforeach
</div>