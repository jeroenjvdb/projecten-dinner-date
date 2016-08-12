<div class="col-sm-4 no-decoration">
    <h3>Allergies
        @if(Auth::user()->id == $profile->id)
            <span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateAllergies"></span>
        @endif
    </h3>
    <ul>
        <li><i class="{{ ($foodprofile->cow_milk ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> cow milk</li>
        <li><i class="{{ ($foodprofile->eggs ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> eggs</li>
        <li><i class="{{ ($foodprofile->shellfish ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> shellfish</li>
        <li><i class="{{ ($foodprofile->peanuts ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> peanuts</li>
        <li><i class="{{ ($foodprofile->treenuts ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> treenuts</li>
        <li><i class="{{ ($foodprofile->wheats ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> wheats</li>
        <li><i class="{{ ($foodprofile->soy ? 'green fa fa-check' : 'red fa fa-times') }}" aria-hidden="true"></i> soy</li>
    </ul>


</div>