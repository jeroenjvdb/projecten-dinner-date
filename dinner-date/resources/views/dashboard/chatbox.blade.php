{{-- {!! Form::open(['url' => '/home/chat/post/1']) !!} --}}
<div id="chatPersons" class="col-md-12">
@foreach($friends as $friend)
<div class="row">
	<div class="col-md-12 chatPerson" id="{{ $friend->id }}">
		<div class="row">
			<div class="col-md-3">
				@if($friend->has('pictures'))
				<img src="{{ $friend->pictures->first()['picture_url'] }}" alt="">
				
				@endif
			</div>
			<div class="col-md-9">
				
		{{ $friend->surname }} {{ $friend->name }}
			</div>
		</div>
		
	</div>
</div>
@endforeach
</div>
<div id="chatForm">
</div>
{{-- {!! Form::close() !!} --}}


<script>
	$(document).ready(function(){
	});
</script>