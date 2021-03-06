@extends('master')

@section('body')
	{!! Form::open(array('files' => 'true', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
		{!! Form::label('name', 'naam', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::text('name','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
		{!! Form::label('sDescription', 'beschrijving van het gerecht', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('sDescription','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('preparations', 'bereiding', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('preparations','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('difficulty', 'moeilijkheid', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::radio('difficulty', '1',array('checked' => 'checked')) !!} 1
				{!! Form::radio('difficulty', '2') !!} 2
				{!! Form::radio('difficulty', '3') !!} 3
				{!! Form::radio('difficulty', '1') !!} 4
				{!! Form::radio('difficulty', '1') !!} 5
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('duration', 'duur' , ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::text('duration','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('ingredients', 'ingredienten', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('ingredients','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('fittingDrinks','passende drank', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('fittingDrinks', '', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('picture','foto', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::file('picture', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-5 col-xs-7">{!! Form::submit('gerecht uploaden', ['class' => 'btn btn-default']) !!}</div>
		</div>
		

	{!! Form::close() !!}
@stop