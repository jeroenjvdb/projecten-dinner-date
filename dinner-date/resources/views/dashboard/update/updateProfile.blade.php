<!-- Modal -->
<div id="updateProfile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Personal info</h3>
      </div>
      <div class="modal-body">

      	<div class="form-horizontal">
		{!! Form::open(array('url' => route('updateProfile'), 'method' => 'post')) !!}
		<div class="form-group">
			{!! Form::label('surname', 'surname', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('surname', $profile->surname, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('name', 'name', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('name', $profile->name, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('sex', 'sex:', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::radio('sex', '0',array('checked' => 'checked')) !!} man <br>
				{!! Form::radio('sex', '1') !!} female <br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('country', 'country', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('country', $profile->country, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('city', 'city', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('city', $profile->city, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('streetname', 'street', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('streetname', $profile->streetname, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('housenumber', 'nr', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('housenumber', $profile->housenumber, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('about', 'about me', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::textarea('about',$profile->about, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-offset-5 col-xs-7">
				{!! Form::submit('update profile', array('class' => 'btn btn-default')) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>




</div>
    </div>

  </div>
</div>
        
      