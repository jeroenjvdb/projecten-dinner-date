    <div class="row">
        <div class="col-sm-6 col-xs-5">
            <h2>
                Info
            </h2>
            @if(Auth::user()->id == $profile->id)
                <a href="#" class="font-size-18 blue" data-toggle="modal" data-target="#updateProfile">
                    Edit
                    <span class="clickable glyphicon glyphicon-pencil" id="edit" ></span>
                </a>
            @endif
            <p>
            @if( $profile->age<2000)
               Age: {!! $profile->age !!}y
            @endif
                    <br> Sex:
                    @if($profile->sex == 0)
                        Man
                    @else
                        Female
                    @endif
                    <br>
                    Looks for:
                    @if($profile->searchFor == 0)
                        Male
                    @else
                        Female
                    @endif
                </p>

                <h3>Residence</h3>
                <p class="subheader">{{ $profile->country }} {{ $profile->city }}</p>
                <h3>About me</h3>
                <p>
                    {!! $profile->about !!}
                </p>
        </div>

        <div class="col-sm-6 col-xs-5">
            <h2>Date profile </h2>
            @if(Auth::user()->id == $profile->id)
                <a href="#" class="font-size-18 blue" data-toggle="modal" data-target="#updateDate">
                    Edit
                    <span class="clickable glyphicon glyphicon-pencil" id="edit" ></span>
                </a>
            @endif
            <h3>My perfect date</h3>
            <p id="perfectDate">
                @if($profile->perfectDate)
                    {{ $profile->perfectDate }}
                @else
                    Kaas en wijn onder een sterrenhemel
                @endif
            </p>
            <h3>My favorite diner</h3>
            <p id="favoriteDish">
                {{$profile->favoriteDish}}
            </p>

            <h3>My favorite restaurant</h3>
            <p>
                {{$profile->favRestaurant}}
            </p>
        </div>
    </div>
