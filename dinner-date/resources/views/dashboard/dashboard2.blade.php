@extends('master')

@section('title')
    {{$profile->surname}} {{$profile->name}}
@stop

@section('body')
    @if(count($errors) > 0)
        <div class="model error no-decoration">
            <ul class="round">
                <li>An error has occured during updating, please open last edit screen</li>
            </ul>
        </div>
    @endif
    @include('dashboard.update.updateTaste')
    @include('dashboard.update.updateKitchen')
    @include('dashboard.update.updateAllergies')
    @include('dashboard.update.updateProfile')
    @include('dashboard.update.updateDate')
    @include('dashboard.picturesModal')
<h1 class="white font-size-50 margin-top-0">Profile</h1>
<div class="jumbotron margin-bottom-40 row">

    <center><h2>Welcom {{$profile->surname }}</h2></center>
    @include('dashboard.partials.pictures')

    <div class="row padding-top-40">
        <div class="col-xs-4 col-md-4 padding-0">
            <a href="{{ route('visitors') }}">
                <center>
                {{--<div class="col-md-offset-4">--}}
                    <div class="round bg-blue height-100 width-100 white text-center">
                        <i class="fa fa-users fa-3x padding-top-10" aria-hidden="true"></i>
                        <p class=""> <span class="font-size-18">{{$visitorsToday}}</span></p>
                        {{--<p>Visitors</p>--}}
                    </div>
                {{--</div>--}}
                </center>
                <p class="col-md-offset-0"><center>Visitors</center> </p>
            </a>
        </div>
        <div class="col-xs-4 col-md-4 padding-0">
            <a href="{{ route('getRequests') }}">
                <center>
                    <div class="round bg-blue height-100 width-100 white text-center">
                            <i class="fa fa-user-plus fa-3x padding-top-10" aria-hidden="true"></i>
                           <p><span class="font-size-18">{{$daterequests}}</span></p>
                    </div>
                </center>
                <p class="col-md-offset-0"><center>Date requests</center> </p>
            </a>
        </div>
        <div class="col-xs-4 col-md-4 padding-0">
            <a href="{{ route('chat') }}">
                <center>
                    <div class="round bg-blue height-100 width-100 white text-center">
                            <i class="fa fa-heart fa-3x padding-top-10" aria-hidden="true"></i>
                           <p><span class="font-size-18">{{$daters}}</span></p>
                    </div>
                </center>
                <p class="col-md-offset-0"><center>Daters</center> </p>
            </a>
        </div>
    </div>
</div>
    <div class="jumbotron margin-bottom-40 row">
        <h1>{{ $profile->surname . " " . $profile->name }}</h1>
    <div class="col-sm-offset-1 col-sm-11">
        @include('dashboard.partials.info')
    </div>
    </div>


<div class="jumbotron margin-bottom-40 row">
    <h1>Food profile </h1>
    <div class="col-sm-offset-1 col-sm-11">
            @include('dashboard.foodprofile.tasteprofile')
            @include('dashboard.foodprofile.kitchen')
            @include('dashboard.foodprofile.allergies')
    </div>
</div>
<div class="jumbotron margin-bottom-40 row">
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