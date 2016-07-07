@extends('master')

@section('title')
	login
@stop

@section('body')
{{--	{{dd($errors)}}--}}
	<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		{!! Form::open(array('url' => '/login', 'method' => 'post', 'class' => 'form-horizontal')) !!}
			<div class="form-group">
				{!! Form::label('email', 'Email adress', ['class' => 'control-label col-xs-5']) !!}
				<div class="col-xs-7">
					{!! Form::text('email', '', array('placeholder' => 'example@test.be', 'class' => 'form-control')) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('password', 'wachtwoord', ['class' => 'control-label col-xs-5']) !!}
				<div class="col-xs-7">
					{!! Form::password('password', ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-offset-5 col-xs-7">
					{!! Form::submit('login', array('class' => 'btn btn-default'	)) !!}
				</div>
			</div>

		{!! Form::close() !!}
	</div>

@stop
