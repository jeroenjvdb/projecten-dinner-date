@extends('master')

@section('title')
    register
@stop

@section('body')
    <div class="row setup">
        <div class="col-sm-offset-2">
        <h1 >food profile</h1>
        <p>Final round of questions!</p>
        <p>This info would be used to find people who match your Taste!</p>
        </div>
        <div class="col-sm-offset-2 col-sm-8">
            <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped"  style="width: 100%;">
                    <span class="">3/3</span>
                </div>
            </div>
        </div>
        <hr>

        {!! Form::open(array('url' => route('setupTaste'), 'method' => 'post')) !!}
        <div class="row">
            @include('Auth.setup.step3.taste')
            @include('Auth.setup.step3.kitchen')
            @include('Auth.setup.step3.allergies')
        </div>

        <div class="col-sm-offset-3 col-sm-9">
            {!! Form::submit('Update food profile', ['class' => 'btn btn-default']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    </div>

@stop

@section('scripts')
@stop