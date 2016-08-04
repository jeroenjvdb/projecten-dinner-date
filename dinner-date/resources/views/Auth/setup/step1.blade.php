@extends('master')

@section('title')
    register
@stop

@section('body')

    <div class="row info">
        <div class="col-sm-offset-4">
            <h1>Setup</h1>
            <p> Before you can go find your perfect Dinner Date, we ask you to fill in a few questions.
                <br>
                A few for your profile. <br>
                A few to help you find your dinner date.
            </p>
            <button id="start">Get started</button>
        </div>
    </div>

    <div class="row setup hide">
        <div class="form-horizontal">
            <h1 class="col-sm-offset-2">Profile info</h1>
            <div class="col-sm-offset-2 col-sm-8 progress">
                <div class="progress-bar progress-bar-success progress-bar-striped"  style="width: 33%;">
                    <span class="">1/3</span>
                </div>
                <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 67%">
                    <span class="sr-only"></span>
                </div>
            </div>
            <hr>

            {!! Form::open(array('url' => route('setupProfile'), 'method' => 'post')) !!}
            <div class="form-group">
                {!! Form::label('surname', 'surname', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('surname', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('sex', 'sex:', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::radio('sex', '0') !!} man
                    {!! Form::radio('sex', '1') !!} vrouw
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('country', 'country', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('country', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('city', 'city', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('city', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('streetname', 'street', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('streetname', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('housenumber', 'nr', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('housenumber', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('about', 'about me', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::textarea('about','', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-9">
                    {!! Form::submit('update profile', array('class' => 'btn btn-default')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        console.log('test');
        $( "#start" ).click(function() {
            $(".info").addClass( "hide" );
            $(".setup").removeClass( "hide" );
        });
    </script>
@stop