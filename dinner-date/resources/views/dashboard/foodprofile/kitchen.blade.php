<div class="col-sm-4">
    <h3>Kitchen profile
        @if(Auth::user()->id == $profile->id)
            <span class="clickable glyphicon glyphicon-pencil" id="edit" data-toggle="modal" data-target="#updateKitchen"></span>
        @endif
    </h3>
    <ul>
        <li>Chinese: {{ ($foodprofile->chinese ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>Japanese: {{ ($foodprofile->japanese ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>French: {{ ($foodprofile->french ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>Greek: {{ ($foodprofile->greek ? 'yes' : 'no') }}</li>
    </ul>
    <ul>
        <li>Italian: {{ ($foodprofile->italian ? 'yes' : 'no') }}</li>
    </ul>
</div>