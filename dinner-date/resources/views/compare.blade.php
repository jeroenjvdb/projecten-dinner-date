@extends('master')

@section('title')
    foto's
@stop

@section('body')
    <h1>people you might be interested in.</h1>
    <div class="row">
        @foreach($people as $key => $item)
            {{--{{dd($item['picture']->picture_url)}}--}}
            <a class="color-black" href="{{ route('getProfile', $item['user']->id) }}">
                <div class="col-sm-3 max-height-500  hover-border ">
                    <div class="margin-top-bottom">
                    {{--<img class="img-responsive" src={!! $item['picture']->picture_url !!} alt="">--}}
                    <img class="max-height-350 img-responsive" src= "/img/users/20667-IMG_3530.PNG" alt="">
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

