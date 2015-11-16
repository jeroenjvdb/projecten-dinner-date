<!-- Trigger the modal with a button -->
<button type="button" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">extra info</h4>
      </div>
      <div class="modal-body">

      	<div class="form-horizontal">	
		{!! Form::open(array('url' => route('update'), 'method' => 'post')) !!}
		<div class="form-group">
			{!! Form::label('country', 'Land', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('country', '', array('placeholder' => 'Belgium', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('city', 'Stad', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('city', '', array('placeholder' => 'Antwerpen', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('streetname', 'Straat', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('streetname', '', array('placeholder' => 'groenplaats', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('housenumber', 'nr', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('housenumber', '', array('placeholder' => '1', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('specialAllergies', 'Allgergien', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('specialAllergies', '', array('placeholder' => 'pinda', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('favoriteDish', 'favoriete maaltijd', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('favoriteDish', '', array('placeholder' => 'macaroni', 'class' => 'form-control')) !!}
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
				{!! Form::textarea('perfectDate', '', array('placeholder' => 'kaas en wijn onder de sterren', 'class' => 'form-control')) !!}
			</div>
		</div>
		{!! Form::hidden('type', 'first') !!}
		<div class="form-group">
			
		<div class="col-xs-offset-5 col-xs-7">
			{!! Form::submit('submit', array('class' => 'btn btn-default')) !!}
		</div>
		</div>
	{!! Form::submit('gegevens toevoegen', ['class' => 'btn btn-default']) !!}
</div>




</div>
    </div>

  </div>
</div>
        
      