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
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-top-bottom-10">
				{!! Form::open(array('url' => route('register'), 'method' => 'post', 'class' => 'form-horizontal')) !!}
					<div class="form-group">
{{--						{!! Form::label('email', 'Email', ['class' => 'col-xs-3 control-label']) !!}--}}
						<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 input-group">
							<span class="input-group-addon" id="basic-addon1"> <span class="glyphicon glyphicon-envelope"></span></span>

							{!! Form::text('email', '', array('placeholder' => 'example@test.be', 'class' => 'form-control', "aria-describedby"=>"basic-addon1")) !!}
						</div>
					</div>
					<div class="form-group">
{{--						{!! Form::label('dateOfBirth', 'birthday', ['class' => 'col-xs-3 control-label']) !!}--}}
						<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 input-group">
							<span class="input-group-addon" id="basic-addon3"> <span class="glyphicon glyphicon-calendar"></span></span>
							{!! Form::date('dateOfBirth',$min=$before, ['class' => 'form-control',"aria-describedby"=>"basic-addon3"]) !!}
						</div>
					</div>
					<div class="form-group">
{{--						{!! Form::label('password', 'password', ['class' => 'col-xs-3 control-label']) !!}--}}
						<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 input-group">
							<span class="input-group-addon" id="basic-addon2"> <span class="glyphicon glyphicon-lock"></span></span>
							{!! Form::password('password',  ['class' => 'form-control',"aria-describedby"=>"basic-addon2 basic-addon4",'id'=>'password']) !!}
							<span id="showPassword" class="input-group-addon" id="basic-addon4"><i class="fa fa-eye" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10">
							{!! Form::submit('Register for free', ['class' => 'btn btn-default form-control bg-blue white font-size-18']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


<script>
	// Check javascript has loaded
	$(document).ready(function(){

		// Click event of the showPassword button
		$('#showPassword').on('click', function(){

			// Get the password field
			var passwordField = $('#password');

			// Get the current type of the password field will be password or text
			var passwordFieldType = passwordField.attr('type');
			console.log(passwordFieldType);
			// Check to see if the type is a password field
			if(passwordFieldType == 'password')
			{
				// Change the password field to text
				passwordField.attr('type', 'text');
			} else {
				// If the password field type is not a password field then set it to password
				passwordField.attr('type', 'password');
			}
		});
	});
</script>