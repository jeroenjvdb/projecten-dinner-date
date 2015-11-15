@extends('master')

@section('body')
	{!! Form::open() !!}
		
		{!! Form::label('password') !!}
		{!! Form::password('password') !!}
		{!! Form::label('password_confirmation') !!}
		{!! Form::password('password_confirmation') !!}

		{!! Form::submit() !!}

	{!! Form::close() !!}
@stop