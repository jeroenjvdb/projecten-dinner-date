@extends('master')

@section('title')
    register
@stop

@section('body')
    <div class="row setup">

        <h1 class="col-sm-offset-2">food profile</h1>
        <div class="col-sm-offset-2 col-sm-8 progress">
            <div class="progress-bar progress-bar-success progress-bar-striped"  style="width: 100%;">
                <span class="">3/3</span>
            </div>
        </div>
        <hr>

        {!! Form::open(array('url' => route('setupTaste'), 'method' => 'post')) !!}
        <div class="row">
            @include('Auth.setup.step3.taste')
            @include('Auth.setup.step3.kitchen')
            @include('Auth.setup.step3.allergies')
        </div>

        {!! Form::submit('Update taste', ['class' => 'btn btn-default']) !!}
        {!! Form::close() !!}
    </div>
    </div>

@stop

@section('scripts')
@stop