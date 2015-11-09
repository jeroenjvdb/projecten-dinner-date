@extends('master')

@section('body')
<div class="row">
	<div class="col-sm-12" id="searchSettings">
		{!! Form::open([ 'method' => 'POST', 'id' => 'searchForm' ]) !!}
		<h2>search</h2>
			<div class="row">
				<div class="col-md-6">
					<p>type:</p>
					{!! Form::radio('type', 'date', false , ['id' => 'date']) !!}
					{!! Form::label('date', 'relatiezoekend') !!}</br>
					{!! Form::radio('type', 'culinair', false, ['id' => 'culinair']) !!}
					{!! Form::label('culinair', 'puur culinair') !!}
					
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<div class="col-md-3 ">
							{!! Form::label('datum') !!}
						</div>
						<div class="col-md-9">
							{!! Form::date('datum', null, array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3">
							{!! Form::label('distance') !!}
						</div>
						<div class="col-md-9">
							<input type="text" class="slider" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="-14" data-slider-orientation="horizontal" data-slider-selection="after"data-slider-tooltip="show">
						</div>
					</div>
					{!! Form::submit() !!}
				</div>
			</div>

		{!! Form::close()!!}
	</div>
	</div>
	<div class="row" id="results">
		test
	</div>
@stop

@section('scripts')
	<script src="/js/bootstrap-slider.js"></script>
	<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
	<link rel="stylesheet" href="/css/slider.css"></link>
	<script>
	$(document).ready(function(){
		$('#searchForm').on('submit', findDates);
		
		// $('#searchForm').trigger('submit');

		console.log('ready');
		$('.slider').slider().on('slideStop', findDates);

		$('#searchForm input').on('change', findDates);


		function findDates(e){
			e.preventDefault();
			// console.log(e);

			var distance = $('.slider').sliderValue();
			console.log('distance: ' + distance);
			var type = $('#searchForm input[name="type"]:checked').val();
			console.log(type);
			var date = $('#searchForm input[name="datum"]').val();
			console.log(date);

			$.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

			$.ajax({
				type: "POST",
				url: "/dates/find", 
				data: {distance: distance, type:type, date:date},
				success: function(data, status){
					console.log(data);
					makeSearch(data);
					for(var i = 0; i<data.length; i++)
					{
						console.log('test');
					}
				}
			});

			// $.ajax({
			// 	type: "POST",
			// 	url: '/dates/find',
			// 	data: {distance: distance, type:type, date:date},
			// 	succes: function(data){
			// 		console.log(data);
			// 	}
			// });

		}

		function makeSearch(data){
		// console.log(data);
		$('#results').text(' ');
			for(var i = 0; i<data.length; i++)
			{

				$('#results').append(searchBlock(data[i]));
			}

		}

		function searchBlock(data)
		{
			var html = '<div class="col-md-6">';
			html += '<div class="row"><div class="col-md-4">';
			html += '<img src="' + data.host.pic['picture_url'] + '" alt="test" />';
			html += '</div>';
			html += '<div class="col-md-8">';
			html += '<p>' + data.host.surname + ' ' + data.host.name + '</p>'; 
			html += '<p>' +data.date+'</p>';
			html += '</div></div>';
			return html;
		}
	});
	</script>
@stop

@section('header')

@stop