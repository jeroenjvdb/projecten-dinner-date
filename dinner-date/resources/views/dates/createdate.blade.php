@extends('master')

@section('title')
	Create Date
@endsection

@section('body')
	<h1 class="font-size-50 white margin-top-0">Create Date</h1>
{{--	{{dd($dishes)}}--}}
<div class="jumbotron">
	<div class="form-horizontal">	
		{!! Form::open(array('url' => route('createDatePost'), 'method' => 'post')) !!}
		<div class="form-group">
			{!! Form::label('date', 'Day', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::date('date',$min=$tomorrow, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('area', 'City', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::text('area', '', array('placeholder' => 'Antwerpen', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('dish_id', 'Select a dish', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!!  Form::select('dish_id', $dishes,'',['class' => 'form-control dropdown']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Describe the date', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::textarea('description', '', array('placeholder' => 'pasta met kaas en hesp in kaassaus', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('preference', 'Prefered company', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::radio('preference', '0') !!} man</br>
				{!! Form::radio('preference', '1') !!} woman
			</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('typeOfDate', 'What kind of date?', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::radio('typeOfDate', '2') !!} Pure culinary</br>
				{!! Form::radio('typeOfDate', '1') !!} Romantic diner
			</br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-3 col-xs-9">
				{!! Form::submit('Create a date', ['class' => 'btn btn-default form-control bg-blue white font-size-18']) !!}
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection