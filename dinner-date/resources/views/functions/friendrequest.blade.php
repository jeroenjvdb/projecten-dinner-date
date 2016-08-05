@extends('master')

@section('title')
    Possible matches
@stop

@section('body')
    <h1>People who want to date</h1>
    <div class="row">
        @foreach($friendRequests as $fQ)
            <a class="color-black" href="{{ route('getProfile', $fQ->user->id) }}">
                <div class="col-sm-3 height-500  hover-border ">
                    <div class="margin-top-bottom">
                        <div class="height-350">
                            @if($fQ->user->picture_url)
                                <img class="max-height-350 img-responsive" src={{$fQ->user->picture_url}} alt="">
                            @else
                                <img class="max-height-350 img-responsive" src="/img/no-pic.jpg" alt="">
                            @endif
                        </div>
                        <div class="text-center">
                            <strong>
                                {{$fQ->user->name}}
                                <br>
                                {{$fQ->user->city}}
                            </strong>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('acceptFriend', [$fQ->user->id]) }}">

                                    <div class="text-center bg-green">accept</div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a class="bg-red" href="{{ route('deleteFriendRequest', [$fQ->user->id]) }}">
                                    <div class="text-center bg-red">decline</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@stop

