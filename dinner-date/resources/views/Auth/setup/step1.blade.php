@extends('master')

@section('title')
    register
@stop

@section('body')
    <h1 class="white font-size-50 text-center margin-bottom-40">Dinner Date</h1>
    <div class="bg-white border-radius-6">
    <div class="jumbotron bg-white">

    <div class="row info">
        <div class="col-sm-offset-3 col-sm-6">
            <h2>Setup</h2>
            <p> Before you can go find your perfect Dinner Date, we ask you to fill in a few questions.
                A few for your profile. <br>
                And a few to help you find your dinner date.
            </p>
            <button class="btn btn-default form-control bg-blue white font-size-18" id="start">Get started</button>
        </div>
    </div>

    <div class="row setup hide bg-white">
        <div class="form-horizontal">
            <div class="row">
                <h2 class="col-sm-offset-3">Profile info</h2>
            </div>

            <div class="row">
                <div class="col-sm-offset-1 col-sm-11">
                    <div class=" progress">
                        <div class="progress-bar bg-green progress-bar"  style="width: 33%;">
                            <span class="">1/3</span>
                        </div>
                        <div class="progress-bar bg-red progress-bar" style="width: 67%">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            {!! Form::open(array('url' => route('setupProfile'), 'method' => 'post')) !!}
            <div class="form-group">
                {!! Form::label('surname', 'surname *', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('surname', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'name *', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('sex', 'sex *', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::radio('sex', '0', ['checked' => 'checked']) !!} man
                    {!! Form::radio('sex', '1') !!} vrouw
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('country', 'country *', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('country', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('city', 'city *', ['class' => 'col-sm-3 control-label']) !!}
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
                {!! Form::label('about', 'about me *', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::textarea('about','', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-11">
                    {!! Form::submit('Update profile', array('class' => 'btn btn-default form-control bg-blue white font-size-18')) !!}
                    <p> * =  required</p>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
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