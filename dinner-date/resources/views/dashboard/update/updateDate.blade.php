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
				<div class="form-group {{ $errors->has('perfectDate') ? ' has-error' : '' }}">
					{!! Form::label('perfectDate', 'Describe your perfect dinner date', ['class' => 'col-xs-12  text-left']) !!}
					<div class="col-xs-12">
						{!! Form::textarea('perfectDate', $profile->perfectDate, ['class' => 'form-control']) !!}</br>
						@include('functions.error',['err' => 'perfectDate'])
					</div>
				</div>
				<div class="form-group {{ $errors->has('favoriteDish') ? ' has-error' : '' }}">
					{!! Form::label('favoriteDish', 'Favorite diner', ['class' => 'col-xs-12 text-left']) !!}
					<div class="col-xs-12">
						{!! Form::text('favoriteDish',$profile->favoriteDish, ['class' => 'form-control']) !!}
						@include('functions.error',['err' => 'favoriteDish'])
					</div>
				</div>
				<div class="form-group {{ $errors->has('favRestaurant') ? ' has-error' : '' }}">
					{!! Form::label('favRestaurant', 'Your favorite restuarant', ['class' => 'col-xs-12 text-left']) !!}
					<div class="col-xs-12">
						{!! Form::text('favRestaurant',$profile->favRestaurant, ['class' => 'form-control']) !!}
						@include('functions.error',['err' => 'favRestaurant'])
					</div>
				</div>

				{{--{!! Form::hidden('type', 'food') !!}--}}
				<div class="form-group">
					<div class="col-xs-12">
						{!! Form::submit('update food profile', ['class' => 'btn btn-default form-control bg-blue white font-size-18']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div><!-- end horizontalform -->
		</div><!-- end modal body -->
    </div><!-- end modal content -->
  </div> <!-- end modal dialog -->
</div> <!-- end mymodal -->