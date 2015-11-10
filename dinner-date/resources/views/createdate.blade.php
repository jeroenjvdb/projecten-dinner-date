@extends('master')

@section('title')
	date aanmaken
@stop

@section('body')
	<h1>createDate</h1>

	<div class="form-horizontal">	
		{!! Form::open(array('url' => route('createDatePost'), 'method' => 'post')) !!}
		<div class="form-group">
			{!! Form::label('dateOfDate', 'datum voor date', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::date('dateOfDate',$min=$today) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('area', 'Stad', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('area', '', array('placeholder' => 'Antwerpen')) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('nameDish', 'Welk gerecht ga je maken', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('nameDish', '', array('placeholder' => 'macaroni')) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('description', 'omschrijf het gerecht', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::textarea('description', '', array('placeholder' => 'paste met kaas en hesp in kaassaus')) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('preference', 'Davoorkeur van gezelschap?', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::radio('preference', '1') !!} man</br>
				{!! Form::radio('preference', '2') !!} vrouw
			</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('typeOfDate', 'wat voor date?', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::radio('typeOfDate', '1') !!} puur culinair</br>
				{!! Form::radio('typeOfDate', '2') !!} romantisch diner
			</br>
			</div>
		</div>
		{!! Form::submit() !!}
	{!! Form::close() !!}
@stop