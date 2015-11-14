<!-- Modal -->
<div id="updateProfile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">extra info</h4>
      </div>
      <div class="modal-body">

      	<div class="form-horizontal">	
		{!! Form::open(array('url' => route('updateProfile'), 'method' => 'post')) !!}
		<div class="form-group">
			{!! Form::label('surname', 'voornaam', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('surname', $profile->surname) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('name', 'naam', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('name', $profile->name) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('country', 'Land', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('country', $profile->country) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('city', 'Stad', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('city', $profile->city) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('streetname', 'Straat', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('streetname', $profile->streetname) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('housenumber', 'nr', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('housenumber', $profile->housenumber) !!}</br>
			</div>
		</div>
		
		
		{!! Form::submit() !!}
	{!! Form::close() !!}
</div>




</div>
    </div>

  </div>
</div>
        
      