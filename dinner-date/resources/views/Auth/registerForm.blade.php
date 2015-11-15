<div class="row register">	
	{!! Form::open(array('url' => route('register'), 'method' => 'post', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			{!! Form::label('email', 'Email adress', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('email', '', array('placeholder' => 'example@test.be', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('surname', 'voornaam', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('surname', '', array('placeholder' => 'jan', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('name', 'naam', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('name', '', array('placeholder' => 'janssens', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('dateOfBirth', 'geboortedatum', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::date('dateOfBirth',$min=$before, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('sex', 'geslacht:', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::radio('sex', '0',array('checked' => 'checked')) !!} man</ br>
				{!! Form::radio('sex', '1') !!} vrouw</ br>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password', 'wachtwoord', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::password('password',  ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'bevestig wachtwoord', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-5 col-xs-7">
				{!! Form::submit('registreren', ['class' => 'btn btn-default']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>