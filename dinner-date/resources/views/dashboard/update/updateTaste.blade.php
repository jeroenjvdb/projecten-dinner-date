<!-- Modal -->
<div id="updateFood" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Which tastes do you like?</h4>
      </div>
      <div class="modal-body">
      	<div class="form-horizontal">	
            {!! Form::open(array('url' => route('updateTaste'), 'method' => 'post')) !!}
            <div class="row">
                {{--{{dd()}}--}}
                <div class="col-sm-offset-2 col-sm-2">

                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    yes
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    no
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-2">
                    <p>Salt</p>
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                        {!! Form::radio('salt', 1, $foodprofile->salt) !!}
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('salt', 0,!$foodprofile->salt) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-offset-2 col-sm-2">
                    <p>Sweet</p>
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('sweet', 1, $foodprofile->sweet) !!}
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('sweet', 0,!$foodprofile->sweet) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-offset-2 col-sm-2">
                    <p>Bitter</p>
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('bitter', 1, $foodprofile->bitter) !!}
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('bitter', 0, !$foodprofile->bitter) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-offset-2 col-sm-2">
                    <p>Sour</p>
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('sour', 1, $foodprofile->sour) !!}
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('sour', 0,!$foodprofile->sour) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-offset-2 col-sm-2">
                    <p>Umami</p>
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('umami', 1, $foodprofile->umami) !!}
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('umami', 0, !$foodprofile->umami) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-2">
                    <p>Spicy</p>
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('spicy', 1, $foodprofile->spicy) !!}
                </div>
                <div class="col-sm-offset-1 col-sm-1">
                    {!! Form::radio('spicy', 0,!$foodprofile->spicy) !!}
                </div>
            </div>

            {!! Form::submit('Update taste', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>
      </div>
    </div>

  </div>
</div>
        


{{--idee: bij smaak: keuken stijl (chinees, japans, ...)--}}