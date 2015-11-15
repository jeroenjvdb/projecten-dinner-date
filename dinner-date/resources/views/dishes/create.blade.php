@extends('master')

@section('body')
	{!! Form::open(array('files' => 'true', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
		{!! Form::label('name', 'naam', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::text('name','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
		{!! Form::label('sDescription', 'korte beschrijving', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('sDescription','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('lDescription', 'volledige beschrijving', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('lDescription','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('difficulty', 'moeilijkheid', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::text('difficulty','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('duration', 'duur' , ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::text('duration','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('ingredients', 'ingredienten', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('ingredients','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('preparations', 'bereiding', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('preparations','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('fittingDrinks','passende drank', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('fittingDrinks', '', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('picture','foto', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::file('picture', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-5 col-xs-7">{!! Form::submit('gerecht uploaden', ['class' => 'btn btn-default']) !!}</div>
		</div>
		

	{!! Form::close() !!}
@stop