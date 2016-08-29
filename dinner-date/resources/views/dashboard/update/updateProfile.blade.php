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

		<div class="form-group {{ $errors->has('surname') ? ' has-error' : '' }}">
			{!! Form::label('surname', 'surname', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('surname', $profile->surname, ['class' => 'form-control']) !!}
				@include('functions.error',['err' => 'surname'])
			</div>
		</div>
		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			{!! Form::label('name', 'name', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('name', $profile->name, ['class' => 'form-control']) !!}
				@include('functions.error',['err' => 'name'])
			</div>
		</div>
		<div class="form-group ">
			<div class="row {{ $errors->has('sex') ? ' has-error' : '' }}">
				{!! Form::label('sex', 'sex', ['class' => 'col-xs-5 control-label']) !!}
				<div class="col-xs-7">
					{!! Form::radio('sex', '0',($profile->sex ? false : true),['id'=>'sman']) !!}
					{!! Form::label('sman', 'male') !!}</br>
					{!! Form::radio('sex', '1',($profile->sex ? true : false),['id'=>'sfemale']) !!}
					{!! Form::label('sfemale', 'female') !!}</br>
					@include('functions.error',['err' => 'sex'])
				</div>
			</div>
			<div class="row {{ $errors->has('searchFor') ? ' has-error' : '' }}">
				{!! Form::label('searchFor', 'I search', ['class' => 'col-xs-5 control-label']) !!}
				<div class="col-xs-7">
					{!! Form::radio('searchFor', '0', ($profile->searchFor ? false : true),['id'=>'man']) !!}
					{!! Form::label('man', 'male') !!}</br>
					{!! Form::radio('searchFor', '1',($profile->searchFor ? true : false),['id'=>'female']) !!}
					{!! Form::label('female', 'female') !!}</br>
					@include('functions.error',['err' => 'searchFor'])
				</div>
			</div>
		</div>
		<div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
			{!! Form::label('country', 'country', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('country', $profile->country, ['class' => 'form-control']) !!}
				@include('functions.error',['err' => 'country'])
			</div>
		</div>
		<div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
			{!! Form::label('city', 'city', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::text('city', $profile->city, ['class' => 'form-control']) !!}
				@include('functions.error',['err' => 'city'])
			</div>
		</div>
		{{--<div class="form-group {{ $errors->has('streetname') ? ' has-error' : '' }}">--}}
			{{--{!! Form::label('streetname', 'street', ['class' => 'col-xs-5 control-label']) !!}--}}
			{{--<div class="col-xs-7">--}}
				{{--{!! Form::text('streetname', $profile->streetname, ['class' => 'form-control']) !!}--}}
				{{--@include('functions.error',['err' => 'streetname'])--}}
			{{--</div>--}}
		{{--</div>--}}
		{{--<div class="form-group {{ $errors->has('housenumber') ? ' has-error' : '' }}">--}}
			{{--{!! Form::label('housenumber', 'nr', ['class' => 'col-xs-5 control-label']) !!}--}}
			{{--<div class="col-xs-7">--}}
				{{--{!! Form::text('housenumber', $profile->housenumber, ['class' => 'form-control']) !!}--}}
				{{--@include('functions.error',['err' => 'housenumber'])--}}
			{{--</div>--}}
		{{--</div>--}}
		<div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
			{!! Form::label('about', 'about me', ['class' => 'col-xs-5 control-label']) !!}
			<div class="col-xs-7">
				{!! Form::textarea('about',$profile->about, ['class' => 'form-control']) !!}
				@include('functions.error',['err' => 'about'])
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12">
				{!! Form::submit('update profile', array('class' => 'btn btn-default form-control bg-blue white font-size-18')) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>




</div>
    </div>

  </div>
</div>
        
      