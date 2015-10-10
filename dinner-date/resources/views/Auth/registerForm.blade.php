	
	{!! Form::open(array('url' => '', 'method' => 'post')) !!}

		{!! Form::label('email', 'Email adress') !!}
		{!! Form::text('email', '', array('placeholder' => 'example@test.be')) !!}</br>

		{!! Form::label('surname', 'voornaam') !!}
		{!! Form::text('surname', '', array('placeholder' => 'jan')) !!}</br>

		{!! Form::label('name', 'naam') !!}
		{!! Form::text('name', '', array('placeholder' => 'janssens')) !!}</br>

		{!! Form::label('password', 'wachtwoord') !!}
		{!! Form::password('password', '') !!}</br>

		{!! Form::label('repeatpw', 'vul wachtwoord nog eens in') !!}
		{!! Form::password('repeatpw', '') !!}</br>

		{!! Form::submit() !!}

	{!! Form::close() !!}