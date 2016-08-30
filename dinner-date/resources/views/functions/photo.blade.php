@extends('master')

@section('title')
	foto's
@stop

@section('body')

	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-offset-2 col-md-8 white">
			<h1>Add picture</h1>
		</div>
		<div class="jumbotron col-md-8 col-md-offset-2">
			{!! Form::open(array('url' => route('PhotoPost'), 'method' => 'post','enctype' =>'multipart/form-data', 'class' => 'form-horizontal')) !!}
			<div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
				<div class="col-md-12 input-group">
					<span class="input-group-addon" id="basic-addon"> <i class="fa fa-picture-o" aria-hidden="true"></i></span>
					{!! Form::file('photo', ['class' => 'form-control',"aria-describedby"=>"basic-addon"]) !!}
				</div>
				@if ($errors->has('photo'))
					{{-- col-xs-8 col-sm-8 col-md-12 col-lg-12--}}
					<div class="col-lg-9">
                        <span class="help-block">
                            <p>{{ $errors->first('photo') }}</p>
                        </span>
					</div>
				@endif
			</div>
			<div class="form-group">
				<div class="">
					{!! Form::submit('Add picture', ['class' => 'btn btn-default width-100pc bg-blue white font-size-18']) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>

@stop

