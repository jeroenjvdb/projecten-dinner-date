<div class="row register">	
	{!! Form::open(array('url' => route('register'), 'method' => 'post', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			{!! Form::label('email', 'Email adress', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('email', '', array('placeholder' => 'example@test.be', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('dateOfBirth', 'geboortedatum', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::date('dateOfBirth',$min=$before, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password', 'wachtwoord', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::password('password',  ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-5 col-xs-7">
				{!! Form::submit('registreren', ['class' => 'btn btn-default']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>