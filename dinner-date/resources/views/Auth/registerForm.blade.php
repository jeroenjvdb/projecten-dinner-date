<div class="form-horizontal">	
	{!! Form::open(array('url' => route('register'), 'method' => 'post')) !!}
		<div class="form-group">
			{!! Form::label('email', 'Email adress', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('email', '', array('placeholder' => 'example@test.be')) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('surname', 'voornaam', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('surname', '', array('placeholder' => 'jan')) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('name', 'naam', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('name', '', array('placeholder' => 'janssens')) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('dateOfBirth', 'geboortedatum', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::date('dateOfBirth',$min=$before) !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password', 'wachtwoord', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::password('password', '') !!}</br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'bevestig wachtwoord', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::password('password_confirmation', '') !!}</br>
			</div>
		</div>
		{!! Form::submit() !!}
	{!! Form::close() !!}
</div>