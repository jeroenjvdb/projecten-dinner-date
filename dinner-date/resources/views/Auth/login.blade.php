@extends('master')

@section('title')
	login
@stop

@section('body')
{{--	{{dd($errors)}}--}}
<h1 class="font-size-50 white margin-top-0">Login</h1>
	<div class="jumbotron row">
	<div class="col-md-8 col-md-offset-2 text-capitalize">

		{!! Form::open(array('url' => '/login', 'method' => 'post', 'class' => 'form-horizontal')) !!}

            <div class="form-group {{ $errors->has('login attempt') ? ' has-error' : '' }}">
                @if ($errors->has('login attempt'))
                    <div class="col-xs-offset-3 col-xs-9">
                        <span class="help-block">
                            <p>{{ $errors->first('login attempt') }}</p>
                        </span>
                    </div>
                @endif
				{!! Form::label('email', 'Email', ['class' => 'control-label col-xs-3']) !!}
				<div class="col-xs-9">
					{!! Form::text('email', '', array('placeholder' => 'example@test.be', 'class' => 'form-control')) !!}
                </div>
			</div>
			<div class="form-group {{ $errors->has('login attempt') ? ' has-error' : '' }}">
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
					{!! Form::submit('Login', array('class' => 'btn btn-default form-control bg-blue white font-size-18')) !!}
				</div>
			</div>

		{!! Form::close() !!}
	</div>

@stop
