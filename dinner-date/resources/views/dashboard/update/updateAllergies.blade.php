<!-- Modal -->
<div id="updateAllergies" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Which allergies do you have?</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    {!! Form::open(array('url' => route('updateTaste'), 'method' => 'post')) !!}
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
                            {!! Form::radio('cow_milk', 1, $foodprofile->cow_milk) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('cow_milk', 0,!$foodprofile->cow_milk) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Eggs</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('eggs', 1, $foodprofile->eggs) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('eggs', 0,!$foodprofile->eggs) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Fish</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('Fish', 1, $foodprofile->Fish) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('Fish', 0, !$foodprofile->Fish) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Shellfish</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('shellfish', 1, $foodprofile->shellfish) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('shellfish', 0,!$foodprofile->shellfish) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Peanuts</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('peanuts', 1, $foodprofile->peanuts) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('peanuts', 0, !$foodprofile->peanuts) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Treenuts</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('treenuts', 1, $foodprofile->treenuts) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('treenuts', 0,!$foodprofile->treenuts) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Wheats</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('wheats', 1, $foodprofile->wheats) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('wheats', 0,!$foodprofile->wheats) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Soy</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('soy', 1, $foodprofile->soy) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('soy', 0,!$foodprofile->soy) !!}
                        </div>
                    </div>

                    {!! Form::submit('Update allergies', ['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>



{{--idee: bij smaak: keuken stijl (chinees, japans, ...)--}}