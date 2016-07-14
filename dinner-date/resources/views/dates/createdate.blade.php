@extends('master')

@section('title')
	Create Date
@endsection

@section('body')
	<h1>Create Date</h1>

	<div class="form-horizontal">	
		{!! Form::open(array('url' => route('createDatePost'), 'method' => 'post')) !!}
		<div class="form-group">
			{!! Form::label('date', 'Day', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::date('date',$min=$today, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('area', 'City', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('area', '', array('placeholder' => 'Antwerpen', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('name_dish', 'Which dish will you make', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('name_dish', '', array('placeholder' => 'macaroni', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Describe the date', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::textarea('description', '', array('placeholder' => 'pasta met kaas en hesp in kaassaus', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('preference', 'Prefered company', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::radio('preference', '1') !!} man</br>
				{!! Form::radio('preference', '2') !!} female
			</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('typeOfDate', 'what kind of date?', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::radio('typeOfDate', '2') !!} Pure culinary</br>
				{!! Form::radio('typeOfDate', '1') !!} Romantic diner
			</br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-5 col-xs-7">
				{!! Form::submit('Create a date', ['class' => 'btn btn-default']) !!}
			</div>
		</div>
	</div>
	{!! Form::close() !!}
@endsection