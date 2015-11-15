@extends('master')

@section('body')
<?php
	// echo '<pre>';
	// var_dump(Session::get('success'));
	// echo '</pre>';
?>
	<div class="col-md-8 col-md-offset-2">
		
	{!! Form::open(array('class' => 'form-horizontal')) !!}
		<div class="form-group">
			{!! Form::label('password', '', array('class' => 'col-xs-4 control-label')) !!}
			<div class="col-xs-8">
				{!! Form::password('password', array('class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'cofirm password', array('class' => 'col-xs-4 control-label')) !!}
			<div class="col-xs-8">
				{!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
			</div>
		</div>
{{-- 		{!! Form::label('password_confirmation') !!}
		{!! Form::password('password_confirmation') !!}
 --}}
 		<div class="form-group">
	 		<div class="col-xs-offset-4 col-xs-8">
			{!! Form::submit('update', array('class' => 'btn btn-default')) !!}
	 		</div>
 		</div>

	{!! Form::close() !!}
	</div>
@stop