<div class="inPictures col-md-4 ">

	<div class="row register text-capitalize ">
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
		<div class="row bg-red border-radius-top-6 white">
			<div class="text-center">
				<h1>Dinner Date</h1>
				<p class="darker-white">Start dating over dinner!</p>
			</div>
		</div>
		<div class="row bg-white border-radius-bottom-6">
			<div class="col-md-12 margin-top-bottom-10">
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
						<div class="col-xs-12">
							{!! Form::submit('Register for free', ['class' => 'btn btn-default form-control bg-blue white font-size-18']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>