<div class="col-sm-4">
    <h3>Taste profile
        @if(Auth::user()->id == $profile->id)
            <span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateFood"></span>
        @endif
    </h3>
    <ul>
        <li>salt: {{ ($foodprofile->salt ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>sweet: {{ ($foodprofile->sweet ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>bitter: {{ ($foodprofile->bitter ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>sour: {{ ($foodprofile->sour ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>umami: {{ ($foodprofile->umami ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>spicy: {{ ($foodprofile->spicy ? 'yes' : 'no') }}</li>
    </ul>

</div>