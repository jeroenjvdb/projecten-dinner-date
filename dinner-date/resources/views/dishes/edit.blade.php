@extends('master')

@section('body')
	{!! Form::open(array('files' => 'true', 'class' => 'form-horizontal','url' => route('postEdit'), 'method' => 'POST')) !!}
		<div class="form-group">
		{!! Form::label('name', 'Name', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::text('name',$dish->name, ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
		{!! Form::label('sDescription', 'Description', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('sDescription',$dish->sDescription, ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('preparations', 'Preparation', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('preparations',$dish->preparations, ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('difficulty', 'Difficulty', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				@for($i = 1; $i<6;$i++)
					@if($i==$dish->difficulty)
						{!! Form::radio('difficulty', $i,array('checked' => 'checked')) !!} {{$i}}
					@else
						{!! Form::radio('difficulty', $i) !!} {{$i}}
					@endif
				@endfor
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('duration', 'Duration' , ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::text('duration',$dish->duration, ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('ingredients', 'ingredients', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('ingredients',$dish->ingredients,
			['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('fittingDrinks','Fitting wines', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::textarea('fittingDrinks', $dish->fittingDrinks, ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('picture','Picture', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::file('picture', ['class' => 'form-control','value'=>$dish->picture]) !!}</div>
		</div>
		<div class="form-group">
			{!! Form::label('url', 'Video', ['class' => 'control-label col-xs-5']) !!}
			<div class="col-xs-7">{!! Form::text('url',$dish->url, ['class' => 'form-control']) !!}</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-5 col-xs-7">{!! Form::submit('Add Dish', ['class' => 'btn btn-default']) !!}</div>
		</div>
	{!! Form::close() !!}
@stop