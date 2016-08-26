@extends('master')

@section('body')
	<h1 class="white font-size-50 margin-top-0">Create a Dish</h1>
	<div class="jumbotron">
	{!! Form::open(array('files' => 'true', 'class' => 'form-horizontal','url' => route('postCreate'),
	'method' => 'POST')) !!}
	<div id="info1">
		<div class="form-group">
		{!! Form::label('name', 'Name', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-7">{!! Form::text('name','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
		{!! Form::label('sDescription', 'Description', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-7">{!! Form::textarea('sDescription','', ['class' => 'form-control', 'rows' =>'5']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('ingredients', 'ingredients', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-7">{!! Form::textarea('ingredients','',
				[
				'class' => 'form-control',
				'placeholder'=>'After each ingredient put a ";" behind it. Like: cheese; bacon;',
				'rows' =>'5'
				]) !!}</div>
		</div>
		<div class="form-group ">
			{!! Form::label('preparations', 'Preparation', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-7">{!! Form::textarea('preparations','', ['class' => 'form-control', 'rows' =>'5']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('picture','Picture', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-7">{!! Form::file('picture', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="col-xs-offset-3 col-sm-7">
			<div id="next" class="btn btn-default form-control bg-blue white font-size-18"> add extra info</div>
		</div>
	</div>
	<div id="info2" class="hide">
		<div class="form-group">
			{!! Form::label('difficulty', 'Difficulty', ['class' => 'col-sm-3 control-label']) !!}
			<div class="col-sm-7">
				{!! Form::radio('difficulty', '1',array('checked' => 'checked')) !!} 1
				{!! Form::radio('difficulty', '2') !!} 2
				{!! Form::radio('difficulty', '3') !!} 3
				{!! Form::radio('difficulty', '1') !!} 4
				{!! Form::radio('difficulty', '1') !!} 5
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('duration', 'Duration' , ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-7">{!! Form::text('duration','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('fittingDrinks','Fitting wines', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-7">{!! Form::textarea('fittingDrinks', '', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('url', 'Video', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-7">{!! Form::text('url','', ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-3">
				<div id="previous" class="btn btn-default btn btn-default form-control bg-blue white font-size-18"> Previous</div>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-3">
				{!! Form::submit('Add Dish', ['class' => 'btn btn-default form-control bg-blue white font-size-18']) !!}
			</div>

		</div>
	</div>
	{!! Form::close() !!}
	</div>
@stop

@section('scripts')
	<script type="text/javascript">
		$( "#next" ).click(function() {
			$("#info1").addClass( "hide" );
			$("#info2").removeClass( "hide" );
		});

		$( "#previous" ).click(function() {
			$("#info2").addClass( "hide" );
			$("#info1").removeClass( "hide" );
		});
	</script>
@stop