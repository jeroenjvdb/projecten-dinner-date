<div class="col-sm-4">
    <h3>Kitchen profile
        @if(Auth::user()->id == $profile->id)
            <span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateAllergies"></span>
        @endif
    </h3>
    <ul>
        <li>cow milk: {{ ($foodprofile->cow_milk ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>eggs: {{ ($foodprofile->eggs ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>shellfish: {{ ($foodprofile->shellfish ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>peanuts: {{ ($foodprofile->peanuts ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>treenuts: {{ ($foodprofile->treenuts ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>wheats: {{ ($foodprofile->wheats ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>soy: {{ ($foodprofile->soy ? 'yes' : 'no') }}</li>
    </ul>

</div>