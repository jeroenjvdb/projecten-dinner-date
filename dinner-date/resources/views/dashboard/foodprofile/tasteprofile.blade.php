<div class="col-sm-4 no-decoration">
    <h2>Taste
    </h2>
    <ul class="font-size-18">
        @if(Auth::user()->id == $profile->id)
            <li>
                <a href="#"  data-toggle="modal" data-target="#updateFood" class="blue" >
                    Edit
                    <span class="clickable glyphicon glyphicon-pencil" id="edit"></span>
                </a>
            </li>
        @endif
        <li><i class="{{ ($foodprofile->cow_milk ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> salt</li>
        <li><i class="{{ ($foodprofile->sweet ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> sweet</li>
        <li><i class="{{ ($foodprofile->bitter ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> bitter</li>
        <li><i class="{{ ($foodprofile->sour ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> sour</li>
        <li><i class="{{ ($foodprofile->umami ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> umami</li>
        <li><i class="{{ ($foodprofile->spicy ? 'green fa fa-check' : 'red fa fa-close') }}" aria-hidden="true"></i> spicy</li>
    </ul>

</div>