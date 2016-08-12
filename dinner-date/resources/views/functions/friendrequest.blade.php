@extends('master')

@section('title')
    Possible matches
@stop

@section('body')
    <h1>Possible daters by profile by your dates</h1>
    <div class="row">
        @foreach($friendRequests as $fQ)
            @if($fQ->date_id)
                @include('functions.partials.friendsRequests')
            @endif
        @endforeach
    </div>
    <h1>Possible daters by profile</h1>
    <div class="row">
        @foreach($friendRequests as $fQ)
            @if(!$fQ->date_id)
                @include('functions.partials.friendsRequests')
            @endif
        @endforeach
    </div>

@stop

