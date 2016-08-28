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
    <center><h2>Welcom {{$profile->surname }}</h2></center>
    @include('dashboard.partials.pictures')

    <div class="row padding-top-20">
        <div class="col-xs-4 col-md-4">
            <a href="{{ route('visitors') }}">
                <div class="col-md-offset-4">
                    <div class="round bg-blue height-100 width-100 white text-center">
                        <i class="fa fa-users fa-2x padding-top-10" aria-hidden="true"></i>
                        <p>{{$visitorsToday}}</p>
                        {{--<p>Visitors</p>--}}
                    </div>
                </div>
                <p class="col-md-offset-5">Visitors</p>
            </a>
        </div>
        <div class="col-xs-4 col-md-4">
            <a href="{{ route('getRequests') }}">
                <div class="col-md-offset-4 ">
                    <div class="round bg-blue height-100 width-100 white text-center">
                            <i class="fa fa-user-plus fa-2x padding-top-10" aria-hidden="true"></i>
                           <p>{{$daterequests}}</p>
                    </div>
                </div>
                <p class="col-md-offset-4"> Date requests</p>
            </a>
        </div>
        <div class="col-xs-4 col-md-4">
            <a href="{{ route('chat') }}">
                <div class="col-md-offset-4 ">
                    <div class="round bg-blue height-100 width-100 white text-center">
                            <i class="fa fa-heart fa-2x padding-top-10" aria-hidden="true"></i>
                           <p>{{$daters}}</p>
                    </div>
                </div>
                <p class="col-md-offset-5"> Daters </p>
            </a>
        </div>
    </div>
</div>
    <div class="jumbotron row">
        <h1>{{ $profile->surname . " " . $profile->name }}</h1>
    <div class="col-sm-offset-1 col-sm-11">
        @include('dashboard.partials.info')
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