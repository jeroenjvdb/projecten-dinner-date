@extends('master')

@section('title')
    Possible matches
@stop

@section('body')
    <h1 class="white font-size-50 padding-top-0">Possible daters</h1>
    <div class="jumbotron">
        @if(count($friendRequests) == 0)
            <h2>You don't have any date requests.</h2>
        @else
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
            @endif
    </div>
    <h1>
        <a class="color-black" href="{{ URL::previous() }}">
            <small class="start-sentence">Back</small>
        </a>
    </h1>
@stop

