@extends('master')

@section('body')
	<h1 class="white font-size-50 margin-top-0">Edit your Dish</h1>

	<div class="jumbotron">
	{!! Form::open(array(
	'files' => 'true',
	'class' => 'form-horizontal',
	'url' => route('postEdit'),
	'method' => 'POST'
	)) !!}
	<div id="info1">

		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		{!! Form::label('name', 'Name', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-9">
				{!! Form::text('name',$dish->name, ['class' => 'form-control']) !!}
				@include('functions.error',['err'=>'name'])
			</div>
		</div>
		<div class="form-group {{ $errors->has('sDescription') ? ' has-error' : '' }}">
		{!! Form::label('sDescription', 'Description', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-9">
				{!! Form::textarea('sDescription',$dish->sDescription, ['class' => 'form-control','rows' =>'5']) !!}
				@include('functions.error',['err'=>'sDescription'])
			</div>
		</div>
		<div class="form-group {{ $errors->has('preparations') ? ' has-error' : '' }}">
			{!! Form::label('preparations', 'Preparation', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-9">
				{!! Form::textarea('preparations',$dish->preparations, ['class' => 'form-control','rows' =>'5']) !!}
				@include('functions.error',['err'=>'preparations'])
			</div>
		</div>
		<div class="form-group {{ $errors->has('ingredients') ? ' has-error' : '' }}">
			{!! Form::label('ingredients', 'Ingredients', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-9">{!! Form::textarea('ingredients',$dish->ingredients,
			['class' => 'form-control','rows' =>'5']) !!}
				@include('functions.error',['err'=>'ingredients'])
			</div>
		</div>

		<div class="form-group {{ $errors->has('picture') ? ' has-error' : '' }}">
			{!! Form::label('picture','Picture', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-9">
				{!! Form::file('picture', ['class' => 'form-control','value'=>$dish->picture]) !!}
				@include('functions.error',['err'=>'picture'])
			</div>
		</div>
		<div class="col-xs-offset-3 col-sm-9">
			<div id="next" class="btn btn-default width-100pc bg-blue white font-size-18"> Add extra info</div>
		</div>
		</div>
		<div id="info2" class="hide">
			<div class="form-group {{ $errors->has('duration') ? ' has-error' : '' }}">
				{!! Form::label('duration', 'Duration' , ['class' => 'control-label col-sm-3']) !!}
				<div class="col-sm-9">
					{!! Form::text('duration',$dish->duration, ['class' => 'form-control']) !!}
					@include('functions.error',['err'=>'duration'])
				</div>
			</div>
		<div class="form-group {{ $errors->has('difficulty') ? ' has-error' : '' }}">
			{!! Form::label('difficulty', 'Difficulty', ['class' => 'col-sm-3 control-label']) !!}
			<div class="col-sm-9">
				@for($i = 1; $i<6;$i++)
					@if($i==$dish->difficulty)
						{!! Form::radio('difficulty', $i,array('checked' => 'checked')) !!} {{$i}}
					@else
						{!! Form::radio('difficulty', $i) !!} {{$i}}
					@endif
				@endfor
					@include('functions.error',['err'=>'difficulty'])
			</div>
		</div>

		<div class="form-group {{ $errors->has('fittingDrinks') ? ' has-error' : '' }}">
			{!! Form::label('fittingDrinks','Fitting wines', ['class' => 'control-label col-sm-3']) !!}
			<div class="col-sm-9">
				{!! Form::textarea('fittingDrinks', $dish->fittingDrinks, ['class' => 'form-control','rows' =>'5']) !!}
				@include('functions.error',['err'=>'fittingDrinks'])
			</div>
		</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-3">
					<div id="previous" class="btn btn-default width-100pc bg-blue white font-size-18"> Previous</div>
				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-3">
					{!! Form::submit('Edit dish', ['class' => 'btn btn-default width-100pc bg-blue white font-size-18']) !!}
				</div>

			</div>
		</div>

		{!! Form::close() !!}
	</div>
	<h1><a class="color-black" href="{{ URL::previous() }}">
			<small class="start-sentence">Back</small>
		</a></h1>
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