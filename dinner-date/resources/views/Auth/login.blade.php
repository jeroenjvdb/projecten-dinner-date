@extends('master')

@section('title')
	login
@stop

@section('body')
{{--	{{dd($errors)}}--}}
	<div class="row">
	<div class="col-md-8 col-md-offset-2 text-capitalize">
		
		{!! Form::open(array('url' => '/login', 'method' => 'post', 'class' => 'form-horizontal')) !!}
			<div class="form-group">
				{!! Form::label('email', 'Email', ['class' => 'control-label col-xs-5']) !!}
				<div class="col-xs-7">
					{!! Form::text('email', '', array('placeholder' => 'example@test.be', 'class' => 'form-control')) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('password', 'password', ['class' => 'control-label col-xs-5']) !!}
				<div class="col-xs-7">
					{!! Form::password('password', ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-offset-5 col-xs-7">
					{!! Form::submit('Login', array('class' => 'btn btn-default'	)) !!}
				</div>
			</div>

		{!! Form::close() !!}
	</div>

@stop
