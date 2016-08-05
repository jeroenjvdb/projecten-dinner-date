@extends('master')

@section('title')
	login
@stop

@section('body')
{{--	{{dd($errors)}}--}}
	<div class="row">
	<div class="col-md-8 col-md-offset-2 text-capitalize">
		<div class="col-sm-offset-3 col-sm-9">
			<h1>Login</h1>
		</div>
		@if(count($errors) > 0)
			<div class="col-sm-offset-3 col-sm-9 error no-decoration">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach

				</ul>
			</div>
		@endif
		<hr>
		<br>
		<br>

		{!! Form::open(array('url' => '/login', 'method' => 'post', 'class' => 'form-horizontal')) !!}
			<div class="form-group">
				{!! Form::label('email', 'Email', ['class' => 'control-label col-xs-3']) !!}
				<div class="col-xs-9">
					{!! Form::text('email', '', array('placeholder' => 'example@test.be', 'class' => 'form-control')) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('password', 'password', ['class' => 'control-label col-xs-3']) !!}
				<div class="col-xs-9">
					{!! Form::password('password', ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('remember', 'Remember me', ['class' => 'control-label col-xs-3']) !!}
				<div class="col-xs-9">
					{!! Form::checkbox('remember') !!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-offset-3 col-xs-9">
					{!! Form::submit('Login', array('class' => 'btn btn-default'	)) !!}
				</div>
			</div>

		{!! Form::close() !!}
	</div>

@stop
