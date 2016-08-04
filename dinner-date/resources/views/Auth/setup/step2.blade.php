@extends('master')

@section('title')
    register
@stop

@section('body')
    <div class="row setup">

        <h1 class="col-sm-offset-2">Date profile</h1>
        <div class="col-sm-offset-2 col-sm-8 progress">
            <div class="progress-bar progress-bar-success progress-bar-striped"  style="width: 67%;">
                <span class="">2/3</span>
            </div>
            <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 33%">
                <span class="sr-only"></span>
            </div>
        </div>
        <hr>
        <div class="form-horizontal">
            {!! Form::open(array('url' => route('setupFood'), 'method' => 'post')) !!}
            <div class="form-group">
                {!! Form::label('favoriteDish', 'Favorite diner', ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-7">
                    {!! Form::text('favoriteDish','', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('favRestaurant', 'Your favorite restuarant', ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-7">
                    {!! Form::text('favRestaurant','', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('perfectDate', 'Describe your perfect dinner date', ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-7">
                    {!! Form::textarea('perfectDate', '', ['class' => 'form-control']) !!}</br>
                </div>
            </div>
            {{--{!! Form::hidden('type', 'food') !!}--}}
            <div class="form-group">
                <div class="col-xs-offset-5 col-xs-7">
                    {!! Form::submit('update food profile', ['class' => 'btn btn-default']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
@stop