@extends('master')

@section('title')
    Possible matches
@stop

@section('body')
    <h1>people you might be interested in.</h1>
    <div class="row">
        @foreach($people as $key => $item)
            <a class="color-black" href="{{ route('getProfile', $item['user']->id) }}">
                <div class="col-sm-3 height-500  hover-border ">
                    <div class="margin-top-bottom">
                        <div class="height-350">
                        @if($item['picture']['picture_url'])
                            <img class="max-height-350 img-responsive" src={{$item['picture']['picture_url']}} alt="">
                        @else
                            <img class="max-height-350 img-responsive" src="/img/no-pic.jpg" alt="">
                        @endif
                        </div>
                            <div class="text-center">
                            <strong>
                            {{$item['user']->name}}
                            <br>
                            {{$item['user']->city}}
                            <br>
                            {{$item['matching']}}% matching
                            </strong>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    
@stop

