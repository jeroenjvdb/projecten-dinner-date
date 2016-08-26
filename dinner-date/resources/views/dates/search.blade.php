@extends('master')

@section('title')
	Search date
@endsection

@section('body')
	<h1 class="font-size-50 white margin-top-0">Search</h1>
<div class="jumbotron">
<div class="row">
	<div class="col-sm-12" id="searchSettings">
		{!! Form::open([ 'method' => 'POST', 'id' => 'searchForm' ]) !!}
			<div class="row">
				<div class="col-md-6">
					<label>Type:</label> <br>
					{!! Form::radio('type', '1', false , ['id' => 'date']) !!}
					{!! Form::label('date', 'Romantic diner') !!}</br>
					{!! Form::radio('type', '2', false, ['id' => 'culinair']) !!}
					{!! Form::label('culinair', 'Pure culinary') !!}
					
				</div>
				<div class="col-md-6">
					<div class="row form-group">
						<div class="col-md-3 right">
							{!! Form::label('Day') !!}
						</div>
						<div class="col-md-9">
							{!! Form::date('datum', $tomorrow, array('class' => 'form-control', 'data-date-format' => 'MM-DD-YYYY')) !!}
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3">
							{!! Form::label('sex', 'Sex') !!}
						</div>
						<div class="col-md-9">
							{!! Form::radio('sex', '0',null,['id' => '0']) !!}
							{!! Form::label('0', 'man') !!}</br>
							{!! Form::radio('sex', '1',null, ['id' => '1']) !!}
							{!! Form::label('1', 'female') !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-offset-3 col-xs-9">
							{!! Form::submit('Submit', array('class' => 'btn btn-default')) !!}
						</div>
					</div>
				</div>
			</div>

		{!! Form::close()!!}
	</div>
	</div>
	<div class="row" id="results">
		
	</div>
	</div>
@endsection

@section('scripts')
	<script src="/js/bootstrap-slider.js"></script>
	<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
	<link rel="stylesheet" href="/css/slider.css">
	<script src="/js/site-func/search.js"></script>

@endsection