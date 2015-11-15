<!-- Modal -->
<div id="updateSmaak" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">enkel laatste 4 ingegeven worden onthouden</h4>
      </div>
      <div class="modal-body">

      	<div class="form-horizontal">	
		{!! Form::open(array('url' => route('update'), 'method' => 'post')) !!}
		<div class="form-group">
			{!! Form::label('tastes', 'smaak toevoegen', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::select('tastes', $tasts) !!}</br>
			</div>
		</div>		
		{!! Form::hidden('type', 'smaak') !!}
		{!! Form::submit() !!}
	{!! Form::close() !!}
</div>




</div>
    </div>

  </div>
</div>
        
      