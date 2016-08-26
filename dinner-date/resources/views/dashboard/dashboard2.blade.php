@extends('master')

@section('title')
    {{$profile->surname}} {{$profile->name}}
@stop

@section('body')
    @include('dashboard.update.updateTaste')
    @include('dashboard.update.updateKitchen')
    @include('dashboard.update.updateAllergies')
    @include('dashboard.update.updateProfile')
    @include('dashboard.update.updateDate')
    @include('dashboard.picturesModal')
<h1 class="white font-size-50 margin-top-0">Profile</h1>
<div class="jumbotron row">
    <div class="col-sm-3 profile-pics" >
        <div data-toggle="modal" data-target="#pictures">
            @if (count($images) === 0)
                <div class="row">
                    <div class="col-sm-12">
                        <img src="/img/no-pic.jpg" />
                    </div>
                </div>
                <div class="row more-pics">
                    <div class="col-sm-3 hidden-xs">
                        <img src="/img/no-pic.jpg" />
                    </div>
                </div>
            @else
                @foreach($images as $index => $image)
                    @if($index==0)
                        <div class="row">
                            <div class="col-sm-12">
                                <img src="{{ $image->picture_url}}"  />
                            </div>
                        </div>
                        <div class="row more-pics hidden-xs">
                            @else
                                <div class="col-sm-3 ">
                                    <img src="{{ $image->picture_url}}" />
                                </div>
                            @endif
                            @endforeach
                        </div>
                    @endif
        </div>
        <div class="row">
            <div class="padding-top-10"><a class="btn btn-default form-control bg-blue white font-size-18" href="{{ route('Photo') }}">upload pic</a></div>
        </div>
    </div>
    <div class="col-sm-8 col-sm-offset-1">
        <div class="row">
            <h1>
                {{ $profile->surname . " " . $profile->name }}

            </h1>
            <div class="col-sm-6 col-xs-5">
                <h2>
                    Info
                </h2>
                @if(Auth::user()->id == $profile->id)
                    <a href="#" class="font-size-18" data-toggle="modal" data-target="#updateProfile">
                       Edit
                        <span class="clickable glyphicon glyphicon-pencil" id="edit" ></span>
                    </a>
                @endif
                @if( $profile->age<2000)
                    <p>leeftijd: {!! $profile->age !!}
                @endif
                @if($profile->sex == 0)
                            <br>   man
                    @else
                            <br> vrouw
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
                    <a href="#" class="font-size-18" data-toggle="modal" data-target="#updateDate">
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
    </div>
</div>
<div class="jumbotron row">
    <h1>Food profile </h1>
    <div class="col-sm-offset-1 col-sm-11">
            @include('dashboard.foodprofile.tasteprofile')
            @include('dashboard.foodprofile.kitchen')
            @include('dashboard.foodprofile.allergies')
    </div>
</div>
<div class="jumbotron row">
    <h1>
        Dishes
    </h1>
    @if(Auth::user()->id == $profile->id)
        <a href="{{ route('dishCreate') }}" class="btn btn-default bg-blue white font-size-18">
           Create a dish <i class="fa fa-plus fa-x1" aria-hidden="true"></i>
        </a>
    @endif

    @include('dishes.partialDish')
    <center><a class="color-black" href="{{ route('myDishes') }}">show all...</a></center>
</div>
@stop

@section('header')
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
@stop

@section('scripts')
    <script src="js/changeProfile.js"></script>
    <script src="js/getChat.js"></script>
@stop