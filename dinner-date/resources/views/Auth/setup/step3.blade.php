@extends('master')

@section('title')
    register
@stop

@section('body')
    <div class="jumbotron">
        <div class="row setup">
            <div class="col-sm-offset-1">
                <h2>Food profile</h2>
                <p>Final round of questions!
                    <br>This info would be used to find people who match your Taste!</p>
            </div>
            <div class="col-sm-12">
                <div class="progress">
                    <div class="progress-bar bg-green progress-bar"  style="width: 100%;">
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

            <div class="col-sm-12">
                {!! Form::submit('Update food profile', ['class' => 'btn btn-default form-control bg-blue white font-size-18']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>


@stop

@section('scripts')
@stop