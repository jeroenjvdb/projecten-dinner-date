@extends('master')

@section('body')
	{!! Form::open(array('files' => 'true')) !!}

		{!! Form::label('name') !!}
		{!! Form::text('name') !!}
		{!! Form::label('sDescription') !!}
		{!! Form::textarea('sDescription') !!}
		{!! Form::label('lDescription') !!}
		{!! Form::textarea('lDescription') !!}
		{!! Form::label('difficulty') !!}
		{!! Form::text('difficulty') !!}
		{!! Form::label('duration') !!}
		{!! Form::text('duration') !!}
		{!! Form::label('ingredients') !!}
		{!! Form::textarea('ingredients') !!}
		{!! Form::label('preparations') !!}
		{!! Form::textarea('preparations') !!}
		{!! Form::label('fittingDrinks') !!}
		{!! Form::textarea('fittingDrinks') !!}
		{!! Form::label('picture') !!}
		{!! Form::file('picture') !!}

		{!! Form::submit() !!}

	{!! Form::close() !!}
@stop