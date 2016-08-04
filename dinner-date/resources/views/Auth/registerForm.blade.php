<div class="row register text-capitalize">
	<div class="row">
		@if(count($errors) > 0)
			<div class="col-sm-offset-2 col-sm-8 error no-decoration">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach

				</ul>
			</div>
		@endif
		@if(Session::get('success'))
			<div class="model success">
				<ul>
					<li>{{ Session::get('success') }}</li>
				</ul>
			</div>
		@endif
	</div>
	<div class="row">
		<h1 class="col-xs-offset-3">Register</h1>
	</div>
	<hr>
	{!! Form::open(array('url' => route('register'), 'method' => 'post', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
			{!! Form::label('email', 'Email', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::text('email', '', array('placeholder' => 'example@test.be', 'class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('dateOfBirth', 'birthday', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::date('dateOfBirth',$min=$before, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('password', 'password', ['class' => 'col-xs-3 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::password('password',  ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-offset-3 col-xs-8">
				{!! Form::submit('Register', ['class' => 'btn btn-default']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>