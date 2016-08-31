<!-- Modal -->
<div id="updateKitchen" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Which kitchenstyles do you like?</h4>
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
                            <p>Chinese</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('chinese', 1, $foodprofile->chinese) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('chinese', 0,!$foodprofile->chinese) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Japanese</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('japanese', 1, $foodprofile->japanese) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('japanese', 0,!$foodprofile->japanese) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>French</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('French', 1, $foodprofile->French) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('French', 0, !$foodprofile->French) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Greek</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('Greek', 1, $foodprofile->Greek) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('Greek', 0,!$foodprofile->Greek) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-2">
                            <p>Italian</p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('italian', 1, $foodprofile->italian) !!}
                        </div>
                        <div class="col-sm-offset-1 col-sm-1">
                            {!! Form::radio('italian', 0, !$foodprofile->italian) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Update kitchen', ['class' => 'btn btn-default form-control bg-blue white font-size-18']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>



{{--idee: bij smaak: keuken stijl (chinees, japans, ...)--}}