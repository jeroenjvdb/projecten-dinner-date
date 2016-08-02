<div id="updateDate" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-capitalize">Date profile</h4>
	      </div><!-- end modal header -->
	    <div class="modal-body">
	     	<div class="form-horizontal">	
				{!! Form::open(array('url' => route('updateFood'), 'method' => 'post')) !!}
				<div class="form-group">
					{!! Form::label('favoriteDish', 'Favorite diner', ['class' => 'col-xs-5 control-label']) !!}
					<div class="col-xs-7">
						{!! Form::text('favoriteDish',$profile->favoriteDish, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('favRestaurant', 'Your favorite restuarant', ['class' => 'col-xs-5 control-label']) !!}
					<div class="col-xs-7">
						{!! Form::text('favRestaurant',$profile->favRestaurant, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('perfectDate', 'Describe your perfect dinner date', ['class' => 'col-xs-5 control-label']) !!}
					<div class="col-xs-7">
						{!! Form::textarea('perfectDate', $profile->perfectDate, ['class' => 'form-control']) !!}</br>
					</div>
				</div>
				{{--{!! Form::hidden('type', 'food') !!}--}}
				<div class="form-group">
					<div class="col-xs-offset-5 col-xs-7">
						{!! Form::submit('update food profile', ['class' => 'btn btn-default']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div><!-- end horizontalform -->
		</div><!-- end modal body -->
    </div><!-- end modal content -->
  </div> <!-- end modal dialog -->
</div> <!-- end mymodal -->