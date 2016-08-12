<div class="col-sm-4 no-decoration">
    <h3>Taste
        @if(Auth::user()->id == $profile->id)
            <span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateFood"></span>
        @endif
    </h3>
    <ul>
        <li><i class="{{ ($foodprofile->cow_milk ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> salt</li>
        <li><i class="{{ ($foodprofile->sweet ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> sweet</li>
        <li><i class="{{ ($foodprofile->bitter ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> bitter</li>
        <li><i class="{{ ($foodprofile->sour ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> sour</li>
        <li><i class="{{ ($foodprofile->umami ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> umami</li>
        <li><i class="{{ ($foodprofile->spicy ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> spicy</li>
    </ul>

</div>