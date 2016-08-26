@extends('master')

@section('title')
    Possible matches
@stop

@section('body')
    <h1 class="font-size-50 white margin-top-0">Find me a date</h1>
    <div class="jumbotron">
        <div class="row">
            <div class="col-sm-3 padding-top-botton-10 margin-top-0">
                <a class="btn btn-default form-control bg-blue white font-size-18" href="{{ route('compare') }}">Randomize</a>
            </div>
        </div>
    <div class="row">
        @foreach($people as $key => $item)
            <a class="color-black" href="{{ route('getProfile', $item['user']->id) }}">
                <div class="col-sm-3 height-500 hover-border border-white padding">
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
                            <p class="text-capitalize">{{$item['user']->surname}}</p>
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
    </div>
    
@stop

