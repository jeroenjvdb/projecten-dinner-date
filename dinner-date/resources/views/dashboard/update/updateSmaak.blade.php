<!-- Modal -->
<div id="updateSmaak" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Only the last 4 are remembered</h4>
      </div>
      <div class="modal-body">
      	<div class="form-horizontal">	
            {!! Form::open(array('url' => route('updateTaste'), 'method' => 'post')) !!}
            <div class="form-group">
                {!! Form::label('tastes', 'Choose a taste', ['class' => 'col-xs-5 control-label']) !!}
                <div class="col-xs-7">
                    {!! Form::select('tastes', $tastes) !!}</br>
                </div>
            </div>
            {!! Form::submit('Add taste', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>
      </div>
    </div>

  </div>
</div>
        


{{--idee: bij smaak: keuken stijl (chinees, japans, ...)--}}