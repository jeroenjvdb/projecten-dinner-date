<div class="col-sm-4 no-decoration">
    <h2>Kitchen
       
    </h2>
    <ul class="font-size-18">
        @if(Auth::user()->id == $profile->id)
            <li>
                <a href="#" data-toggle="modal" data-target="#updateKitchen">
                    Edit <span class="clickable glyphicon glyphicon-pencil" id="edit" ></span>
                </a>
            </li>
        @endif
        <li><i class="{{ ($foodprofile->chinese ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> Chinese</li>
        <li><i class="{{ ($foodprofile->japanese ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i>  Japanese</li>
        <li><i class="{{ ($foodprofile->french ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i>  French</li>
        <li><i class="{{ ($foodprofile->greek ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i>  Greek</li>
        <li><i class="{{ ($foodprofile->italian ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> Italian</li>
    </ul>
</div>