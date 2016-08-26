@extends('master')

@section('title')
    Possible matches
@stop

@section('body')
    <h1 class="white font-size-50 padding-top-0">Possible daters</h1>
    <div class="jumbotron">
        <h2>By date</h2>
        <div class="row">
            @foreach($friendRequests as $fQ)
                @if($fQ->date_id)
                    @include('functions.partials.friendsRequests')
                @endif
            @endforeach
        </div>
        <h2>By profile</h2>
        <div class="row">
            @foreach($friendRequests as $fQ)
                @if(!$fQ->date_id)
                    @include('functions.partials.friendsRequests')
                @endif
            @endforeach
        </div>
    </div>
@stop

