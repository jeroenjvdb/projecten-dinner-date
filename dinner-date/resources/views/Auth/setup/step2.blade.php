@extends('master')

@section('title')
    register
@stop

@section('body')
    <div class="row setup">
        <div class="col-sm-offset-2">
            <h1 >Date profile</h1>
            <p>Half way there!</p>
            <p>Tell visitors what you like for a date.</p>
        </div>
        <div class="col-sm-offset-2 col-sm-8">
            <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped"  style="width: 67%;">
                <span class="">2/3</span>
            </div>
            <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 33%">
                <span class="sr-only"></span>
            </div>
            </div>
        </div>
        <hr>
        <div class="form-horizontal">
            {!! Form::open(array('url' => route('setupFood'), 'method' => 'post')) !!}
            <div class="form-group">
                {!! Form::label('perfectDate', 'Describe your perfect dinner date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::textarea('perfectDate', '', ['class' => 'form-control']) !!}</br>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('favoriteDish', 'Favorite diner', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('favoriteDish','', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('favRestaurant', 'Your favorite restuarant', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('favRestaurant','', ['class' => 'form-control']) !!}
                </div>
            </div>
            {{--{!! Form::hidden('type', 'food') !!}--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    {!! Form::submit('Update date profile', ['class' => 'btn btn-default']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
@stop