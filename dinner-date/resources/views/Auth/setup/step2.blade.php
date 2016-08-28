@extends('master')

@section('title')
    register
@stop

@section('body')
    <h1 class="white font-size-50 text-center margin-bottom-40">Dinner Date</h1>
    <div class="bg-white border-radius-6">
        <div class="jumbotron bg-white font-size-18">
            <div class="form-horizontal">

            <div class="row setup">
            <div class="row">
                <div class="col-sm-offset-3">
                    <h2 >Date profile</h2>
                    <p class="">Half way there! <br>
                    Tell visitors what you like for a date.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10">
                    <div class="progress">
                    <div class="progress-bar bg-green progress-bar"  style="width: 67%;">
                        <span class="">2/3</span>
                    </div>
                    <div class="progress-bar bg-red progress-bar" style="width: 33%">
                        <span class="sr-only"></span>
                    </div>
                    </div>
                </div>
            </div>
        <hr>
                {{-- --}}
            {!! Form::open(array('url' => route('setupFood'), 'method' => 'post')) !!}

                <div class="form-group {{ $errors->has('perfectDate') ? ' has-error' : '' }}">
                {!! Form::label('perfectDate', 'Describe your perfect dinner date', ['class' => 'col-sm-offset-1 col-sm-2 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::textarea('perfectDate', '', ['class' => 'form-control']) !!}</br>
                    @include('functions.error',['err' => 'perfectDate'])
                </div>
            </div>
            <div class="form-group {{ $errors->has('favoriteDish') ? ' has-error' : '' }}">
                {!! Form::label('favoriteDish', 'Favorite diner', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('favoriteDish','', ['class' => 'form-control']) !!}
                    @include('functions.error',['err' => 'favoriteDish'])
                </div>
            </div>
            <div class="form-group {{ $errors->has('favRestaurant') ? ' has-error' : '' }}">
                {!! Form::label('favRestaurant', 'Your favorite restuarant', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('favRestaurant','', ['class' => 'form-control']) !!}
                    @include('functions.error',['err' => 'favRestaurant'])
                </div>
            </div>
            {{--{!! Form::hidden('type', 'food') !!}--}}
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    {!! Form::submit('Update date profile', ['class' => 'btn btn-default form-control bg-blue white font-size-18']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

        </div>
    </div>
@stop

@section('scripts')
@stop