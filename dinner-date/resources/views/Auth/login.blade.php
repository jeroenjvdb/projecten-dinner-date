@extends('master')

@section('title')
	login
@stop

@section('body')
	{!! Form::open(array('url' => '/login', 'method' => 'post')) !!}

		{!! Form::label('email', 'Email adress') !!}
		{!! Form::text('email', '', array('placeholder' => 'example@test.be')) !!}</br>

		{!! Form::label('password', 'wachtwoord') !!}
		{!! Form::password('password') !!}</br>

		{!! Form::submit() !!}

	{!! Form::close() !!}
@stop
