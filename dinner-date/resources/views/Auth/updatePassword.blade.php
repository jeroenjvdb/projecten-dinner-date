@extends('master')

@section('body')
	{!! Form::open() !!}
		
		{!! Form::label('password') !!}
		{!! Form::password('password') !!}
		{!! Form::label('password_confirmed') !!}
		{!! Form::password('password_confirmed') !!}

		{!! Form::submit() !!}

	{!! Form::close() !!}
@stop