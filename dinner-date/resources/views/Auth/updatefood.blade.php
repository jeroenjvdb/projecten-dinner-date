<div id="updateFood" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">extra info</h4>
	      </div><!-- end modal header -->
	    <div class="modal-body">

	     	<div class="form-horizontal">	
				{!! Form::open(array('url' => route('updateFood'), 'method' => 'post')) !!}
				<div class="form-group">
					{!! Form::label('specialAllergies', 'Allgergien', ['class' => 'col-xs-5 control-label']) !!}
					<div class="col-xs-7">
						{!! Form::text('specialAllergies', $profile->specialAllergies) !!}</br>
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('favoriteDish', 'favoriete maaltijd', ['class' => 'col-xs-5 control-label']) !!}
					<div class="col-xs-7">
						{!! Form::text('favoriteDish',$profile->favoriteDish) !!}</br>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('spicyness', 'pikantheid level?', ['class' => 'col-xs-5 control-label']) !!}
					<div class="col-xs-7">
						{!! Form::radio('spicyness', '1') !!} 1
						{!! Form::radio('spicyness', '2') !!} 2
						{!! Form::radio('spicyness', '3') !!} 3
						{!! Form::radio('spicyness', '4') !!} 4
						{!! Form::radio('spicyness', '5') !!} 5
					</br>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('perfectDate', 'omschrijf je perfecte date', ['class' => 'col-xs-5 control-label']) !!}
					<div class="col-xs-7">
						{!! Form::textarea('perfectDate', $profile->perfectDate) !!}</br>
					</div>
				</div>
		
				{!! Form::submit() !!}
				{!! Form::close() !!}
			</div><!-- end horizontalform -->
		</div><!-- end modal body -->
    </div><!-- end modal content -->
  </div> <!-- end modal dialog -->
</div> <!-- end mymodal -->