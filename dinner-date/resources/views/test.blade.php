@extends('master')

@section('title')
	date aanmaken
@stop

@section('body')
	<h1>createDate</h1>

	
		{!! Form::open(array('url' => route('testpost'), 'method' => 'post','enctype' =>'multipart/form-data')) !!}
		<div class="form-group">
			{!! Form::label('photo', 'upload picture', ['class' => 'col-xs-5 control-label']) !!}
				<div class="col-xs-7">
			{!! Form::file('photo') !!}</br>
			</div>
					</div>
		<div class="form-group">
			{!! Form::label('description', 'naamomschrijving', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('description') !!}</br>
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('isDish', 'maaltijd foto?', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::checkbox('isDish'); !!}</br>
			</div>
		</div>
		{!! Form::submit() !!}
	{!! Form::close() !!}
@stop

