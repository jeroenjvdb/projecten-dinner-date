@extends('master')

@section('title')
	login
@stop

@section('body')
{{--	{{dd($errors)}}--}}
	<div class="row">
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3">
				<center>
					<h1 class="font-size-50 white margin-top-0 padding-bottom-20">Dinner Date</h1>
				</center>
			</div>
		</div>
		<div class="jumbotron col-md-6 col-md-offset-3 text-capitalize">
			<div class="row padding-top-botton-20">
			<center>
				<img src="/img/no-pic.jpg" class="img-circle img-responsive height-150 width-150" alt="">
				<div class="row padding-top-botton-10 bold font-size-26">
					Welcom Back!
				</div>

			</center>

			</div>
			{!! Form::open(array('url' => '/login', 'method' => 'post', 'class' => 'form-horizontal')) !!}

            <div class="form-group {{ $errors->has('login attempt') ? ' has-error' : '' }}">
                @if ($errors->has('login attempt'))
					{{-- col-xs-8 col-sm-8 col-md-12 col-lg-12--}}
                    <div class="col-lg-offset-3 col-lg-9">
                        <span class="help-block">
                            <p>{{ $errors->first('login attempt') }}</p>
                        </span>
                    </div>
                @endif
				<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 input-group">
					<span class="input-group-addon" id="basic-addon1"> <span class="glyphicon glyphicon-envelope"></span></span>
					{!! Form::text('email', '', array('autofocus'=>'autofocus','placeholder' => 'Email', 'class' => 'form-control',"aria-describedby"=>"basic-addon1")) !!}
                </div>
			</div>
			<div class="form-group {{ $errors->has('login attempt') ? ' has-error' : '' }}">
				<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 input-group">
					<span class="input-group-addon" id="basic-addon2"> <span class="glyphicon glyphicon-lock"></span></span>
					{!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control',"aria-describedby"=>"basic-addon2"]) !!}
				</div>
			</div>
			<div class="form-group ">
				<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10">
					{!! Form::submit('Login', array('class' => 'btn btn-default form-control bg-blue white font-size-18')) !!}
				</div>
			</div>

		{!! Form::close() !!}
	</div>
	</div>
@stop
