@extends('master')

@section('body')
<div class="row">
	<div class="col-sm-12" id="searchSettings">
		{!! Form::open([ 'method' => 'POST', 'id' => 'searchForm' ]) !!}
		<h2>search</h2>
			<div class="row">
				<div class="col-md-6">
					<p>type:</p>
					{!! Form::radio('type', 'romantic', false , ['id' => 'date']) !!}
					{!! Form::label('romantic', 'relatiezoekend') !!}</br>
					{!! Form::radio('type', 'culinair', false, ['id' => 'culinair']) !!}
					{!! Form::label('culinair', 'puur culinair') !!}
					
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<div class="col-md-3 ">
							{!! Form::label('datum') !!}
						</div>
						<div class="col-md-9">
							{!! Form::date('datum', null, array('class' => 'form-control', 'data-date-format' => 'MM-DD-YYYY')) !!}
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3">
							{!! Form::label('sex', 'geslacht') !!}
						</div>
						<div class="col-md-9">
							{!! Form::radio('sex', '1', ['id' => '1']) !!}
							{!! Form::label('1', 'man') !!}</br>
							{!! Form::radio('sex', '2', ['id' => '2']) !!}
							{!! Form::label('2', 'vrouw') !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-offset-3 col-xs-9">
							{!! Form::submit('submit', array('class' => 'btn btn-default')) !!}
							
						</div>
					</div>
				</div>
			</div>

		{!! Form::close()!!}
	</div>
	</div>
	<div class="row" id="results">
		
	</div>
@stop

@section('scripts')
	<script src="/js/bootstrap-slider.js"></script>
	<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
	<link rel="stylesheet" href="/css/slider.css"></link>
	<script>
	$(document).ready(function(){
		// $('#datum').on('change', function(){
		// 	this.setAttribute(
		// 		"data-date",
		// 		moment(this.value, "MM-DD-YYYY")
		// 		.format( this.getAttribute('data-date-format') )
		// 	).trigger('change');
		$('#searchForm').on('submit', findDates);
		
		$('#searchForm').trigger('submit');

		console.log('ready');
		// $('.slider').slider().on('slideStop', findDates);

		$('#searchForm input').on('change', findDates);


		function findDates(e){
			e.preventDefault();
			// console.log(e);

			var sex = $('#searchForm input[name="sex"]:checked').val();
			console.log('gender: ' + sex);
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
				data: {sex: sex, type:type, date:date},
				success: function(data, status){
					console.log(data);
					makeSearch(data);
					for(var i = 0; i<data.length; i++)
					{
						console.log('test');
					}
				},
				error: function(data, status){
					console.log(data);
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
			if(data.host.pic ){
				html += '<img src="' + data.host.pic['picture_url'] + '" alt="test" />';
			}
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