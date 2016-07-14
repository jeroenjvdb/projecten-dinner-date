@extends('master')

@section('title')
	Search date
@endsection

@section('body')
<div class="row">
	<div class="col-sm-12" id="searchSettings">
		{!! Form::open([ 'method' => 'POST', 'id' => 'searchForm' ]) !!}
		<h2>search</h2>
			<div class="row">
				<div class="col-md-6">
					<p>Type:</p>
					{!! Form::radio('type', '1', false , ['id' => 'date']) !!}
					{!! Form::label('date', 'Romantic diner') !!}</br>
					{!! Form::radio('type', '2', false, ['id' => 'culinair']) !!}
					{!! Form::label('culinair', 'Pure culinary') !!}
					
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<div class="col-md-3 right">
							{!! Form::label('Day') !!}
						</div>
						<div class="col-md-9">
							{!! Form::date('datum', $tomorrow, array('class' => 'form-control', 'data-date-format' => 'MM-DD-YYYY')) !!}
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3">
							{!! Form::label('sex', 'Sex') !!}
						</div>
						<div class="col-md-9">
							{!! Form::radio('sex', '1',null,['id' => '1']) !!}
							{!! Form::label('1', 'man') !!}</br>
							{!! Form::radio('sex', '2',null, ['id' => '2']) !!}
							{!! Form::label('2', 'female') !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-offset-3 col-xs-9">
							{!! Form::submit('Submit', array('class' => 'btn btn-default')) !!}
						</div>
					</div>
				</div>
			</div>

		{!! Form::close()!!}
	</div>
	</div>
	<div class="row" id="results">
		
	</div>
@endsection

@section('scripts')
	<script src="/js/bootstrap-slider.js"></script>
	<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
	<link rel="stylesheet" href="/css/slider.css">
	<script src="/js/site-func/search.js"></script>

	{{--<script>--}}
	{{--$(document).ready(function(){--}}
		{{--// $('#datum').on('change', function(){--}}
		{{--// 	this.setAttribute(--}}
		{{--// 		"data-date",--}}
		{{--// 		moment(this.value, "MM-DD-YYYY")--}}
		{{--// 		.format( this.getAttribute('data-date-format') )--}}
		{{--// 	).trigger('change');--}}
		{{--$('#searchForm').on('submit', findDates);--}}

		{{--$('#searchForm').trigger('submit');--}}

		{{--console.log('ready');--}}
		{{--// $('.slider').slider().on('slideStop', findDates);--}}

		{{--$('#searchForm input').on('change', findDates);--}}


		{{--function findDates(e){--}}
			{{--e.preventDefault();--}}
			{{--// console.log(e);--}}

			{{--var sex = $('#searchForm input[name="sex"]:checked').val();--}}
			{{--console.log('gender: ' + sex);--}}
			{{--var type = $('#searchForm input[name="type"]:checked').val();--}}
			{{--console.log(type);--}}
			{{--var date = $('#searchForm input[name="datum"]').val();--}}
			{{--console.log(date);--}}

			{{--$.ajaxSetup({--}}
                {{--headers: {--}}
                    {{--'X-XSRF-Token': $('meta[name="_token"]').attr('content')--}}
                {{--}--}}
            {{--});--}}

			{{--$.ajax({--}}
				{{--type: "POST",--}}
				{{--url: "/dates/find",--}}
				{{--data: {sex: sex, type:type, date:date},--}}
				{{--success: function(data, status){--}}
					{{--console.log(data);--}}
					{{--makeSearch(data);--}}
					{{--for(var i = 0; i<data.length; i++)--}}
					{{--{--}}
						{{--console.log('test');--}}
					{{--}--}}
				{{--},--}}
				{{--error: function(data, status){--}}
					{{--console.log(data);--}}
				{{--}--}}
			{{--});--}}

			{{--// $.ajax({--}}
			{{--// 	type: "POST",--}}
			{{--// 	url: '/dates/find',--}}
			{{--// 	data: {distance: distance, type:type, date:date},--}}
			{{--// 	succes: function(data){--}}
			{{--// 		console.log(data);--}}
			{{--// 	}--}}
			{{--// });--}}

		{{--}--}}

		{{--function makeSearch(data){--}}
		{{--// console.log(data);--}}
		{{--$('#results').text(' ');--}}
			{{--for(var i = 0; i<data.length; i++)--}}
			{{--{--}}

				{{--$('#results').append(searchBlock(data[i]));--}}
			{{--}--}}

		{{--}--}}

		{{--function searchBlock(data)--}}
		{{--{--}}
			{{--var html = '<div class="col-md-6">';--}}
			{{--html += '<div class="row"><div class="col-md-4">';--}}
			{{--if(data.host.pic ){--}}
				{{--html += '<img src="' + data.host.pic['picture_url'] + '" alt="test" />';--}}
			{{--}--}}
			{{--html += '</div>';--}}
			{{--html += '<div class="col-md-8">';--}}
			{{--html += '<p>' + data.host.surname + ' ' + data.host.name + '</p>';--}}
			{{--html += '<p>' +data.date+'</p>';--}}
			{{--html += '</div></div>';--}}
			{{--return html;--}}
		{{--}--}}
	{{--});--}}
	{{--</script>--}}
@endsection

@section('header')

@endsection