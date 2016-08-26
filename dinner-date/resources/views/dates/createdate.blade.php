@extends('master')

@section('title')
	Create Date
@endsection

@section('body')
{{--	{{dd($errors)}}--}}
	<h1 class="font-size-50 white margin-top-0">Create Date
		<br>
		<a class="color-black" href="{{ URL::previous() }}">
			<small class="start-sentence">Back</small>
		</a>
	</h1>
{{--	{{dd($dishes)}}--}}
<div class="jumbotron">
	<div class="form-horizontal">	
		{!! Form::open(array('url' => route('createDatePost'), 'method' => 'post')) !!}

		<div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
			{!! Form::label('date', 'Day', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::date('date',$min=$tomorrow, ['class' => 'form-control']) !!}
				@if ($errors->has('date'))
					<div class="">
                        <span class="help-block">
                            <p>{{ $errors->first('date') }}</p>
                        </span>
					</div>
				@endif
			</div>
		</div>
		<div class="form-group {{ $errors->has('area') ? ' has-error' : '' }}">
			{!! Form::label('area', 'City', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::text('area', '', array('placeholder' => 'Antwerpen', 'class' => 'form-control')) !!}
				@if ($errors->has('area'))
					<div class="">
                        <span class="help-block">
                            <p>{{ $errors->first('area') }}</p>
                        </span>
					</div>
				@endif
			</div>
		</div>
		<div class="form-group {{ $errors->has('dish_id') ? ' has-error' : '' }}">
			{!! Form::label('dish_id', 'Select a dish', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!!  Form::select('dish_id', $dishes,'',['class' => 'form-control dropdown']) !!}
				@if ($errors->has('dish_id'))
					<div class="">
                        <span class="help-block">
                            <p>{{ $errors->first('dish_id') }}</p>
                        </span>
					</div>
				@endif
			</div>
		</div>
		<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
			{!! Form::label('description', 'Describe the date', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::textarea('description', '', array('placeholder' => 'pasta met kaas en hesp in kaassaus', 'class' => 'form-control')) !!}
				@if ($errors->has('description'))
					<div class="">
                        <span class="help-block">
                            <p>{{ $errors->first('description') }}</p>
                        </span>
					</div>
				@endif
			</div>
		</div>
		<div class="form-group {{ $errors->has('preference') ? ' has-error' : '' }}">
			{!! Form::label('preference', 'Prefered company', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::radio('preference', '0',true,['id'=>'man']) !!}
				{!! Form::label('man', 'Male') !!}</br>

				{!! Form::radio('preference', '1',false,['id'=>'female']) !!}
				{!! Form::label('female', 'Female') !!}
				@if ($errors->has('preference'))
					<div class="">
                        <span class="help-block">
                            <p>{{ $errors->first('preference') }}</p>
						</span>
					</div>
				@endif
			</div>
		</div>
		<div class="form-group {{ $errors->has('typeOfDate') ? ' has-error' : '' }}">
			{!! Form::label('typeOfDate', 'What kind of date?', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-9">
				{!! Form::radio('typeOfDate', '1',true,['id'=>'rom']) !!}
				{!! Form::label('rom', 'Romantic diner') !!}</br>
				{!! Form::radio('typeOfDate', '2',false,['id'=>'cul']) !!}
				{!! Form::label('cul', 'Pure culinary') !!}

			@if ($errors->has('typeOfDate'))
					<div class="">
                        <span class="help-block">
                            <p>{{ $errors->first('typeOfDate') }}</p>
                        </span>
					</div>
				@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-3 col-xs-9">
				{!! Form::submit('Create a date', ['class' => 'btn btn-default form-control bg-blue white font-size-18']) !!}
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection