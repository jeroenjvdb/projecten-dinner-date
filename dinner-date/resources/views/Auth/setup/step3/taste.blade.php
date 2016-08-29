<div class="col-sm-4">
    <h3 class="col-sm-offset-2">Taste profile</h3>
    <div class="row">
        {{--{{dd()}}--}}
        <div class="col-sm-offset-2 col-sm-2">

        </div>
        <div class="col-sm-offset-1 col-sm-1 bold green">
            <p class="">yes</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1 bold red">
            <p  class="">no</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Salt</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('salt', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('salt', 0,true) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Sweet</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('sweet', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('sweet', 0,true) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Bitter</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('bitter', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('bitter', 0, true) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Sour</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('sour', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('sour', 0,true) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Umami</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('umami', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('umami', 0, true) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Spicy</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('spicy', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('spicy', 0, true) !!}
        </div>
    </div>
</div>
