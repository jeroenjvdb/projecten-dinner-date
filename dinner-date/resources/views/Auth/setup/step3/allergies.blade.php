<div class="col-sm-4">
    <h3 class="col-sm-offset-2">Allergies profile</h3>
    <div class="row">
        {{--{{dd()}}--}}
        <div class="col-sm-offset-2 col-sm-2">

        </div>
        <div class="col-sm-offset-1 col-sm-1">
            yes
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            no
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Cow's milk</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('cow_milk', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('cow_milk', 0, true) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Eggs</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('eggs', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('eggs', 0, true) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Fish</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('Fish', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('Fish', 0, true) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Shellfish</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('shellfish', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('shellfish', 0, true) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Peanuts</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('peanuts', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('peanuts', 0, true) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Treenuts</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('treenuts', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('treenuts', 0, true) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Wheats</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('wheats', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('wheats', 0, true) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-2">
            <p>Soy</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('soy', 1) !!}
        </div>
        <div class="col-sm-offset-1 col-sm-1">
            {!! Form::radio('soy', 0, true) !!}
        </div>
    </div>
</div>