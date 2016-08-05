@extends('master')

@section('title')
	foto's
@stop

@section('body')
	<div class="row">
		<div class="col-sm-offset-3">
			<h1>Add picture</h1>
			<hr>
		</div>
	</div>
	<div class="row">
		{!! Form::open(array('url' => route('PhotoPost'), 'method' => 'post','enctype' =>'multipart/form-data', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			{!! Form::label('photo', 'upload picture', ['class' => 'col-sm-3 control-label']) !!}
			<div class="col-sm-9">
				{!! Form::file('photo', ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				{!! Form::submit('Add Picture', ['class' => 'btn btn-default']) !!}
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@stop

