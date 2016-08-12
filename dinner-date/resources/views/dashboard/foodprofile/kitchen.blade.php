<div class="col-sm-4 no-decoration">
    <h3>Kitchen
        @if(Auth::user()->id == $profile->id)
            <span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateKitchen"></span>
        @endif
    </h3>
    <ul>
        <li><i class="{{ ($foodprofile->chinese ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> Chinese</li>
        <li><i class="{{ ($foodprofile->japanese ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i>  Japanese</li>
        <li><i class="{{ ($foodprofile->french ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i>  French</li>
        <li><i class="{{ ($foodprofile->greek ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i>  Greek</li>
        <li><i class="{{ ($foodprofile->italian ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> Italian</li>
    </ul>
</div>