@extends('master')

@section('title')
	date aanmaken
@stop

@section('body')
	<h1>Date aanmaken</h1>

	<div class="form-horizontal">	
		{!! Form::open(array('url' => route('createDatePost'), 'method' => 'post')) !!}
		<div class="form-group">
			{!! Form::label('date', 'datum voor date', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::date('date',$min=$today, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('area', 'Stad', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('area', '', array('placeholder' => 'Antwerpen', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('name_dish', 'Welk gerecht ga je maken', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('name_dish', '', array('placeholder' => 'macaroni', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Omschrijf de Date', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::textarea('description', '', array('placeholder' => 'pasta met kaas en hesp in kaassaus', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('preference', 'voorkeur van gezelschap?', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::radio('preference', '1') !!} man</br>
				{!! Form::radio('preference', '2') !!} vrouw
			</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('typeOfDate', 'wat voor date?', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::radio('typeOfDate', '2') !!} puur culinair</br>
				{!! Form::radio('typeOfDate', '1') !!} romantisch diner
			</br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-5 col-xs-7">
				{!! Form::submit('maak date', ['class' => 'btn btn-default']) !!}
			</div>
		</div>
	{!! Form::close() !!}
@stop