@extends('master')

@section('title')
Random date
@stop

@section('body')
    <h1 class="font-size-50 white margin-top-0">Random dater</h1>
    <div class="jumbotron">
        <h2 class="blue">Here you find eight random daters. <br> Click randomize for eight new random daters</h2>
        <div class="row">
            <div class="col-sm-3 padding-top-botton-10 margin-top-0">
                <a class="btn btn-default bg-blue white font-size-18" href="{{ route('compare') }}">Randomize</a>
            </div>
        </div>
    <div class="row">
       {{--{{dd($people)}}--}}
        @foreach($people as $key => $item)
            {{--{{dd($item)}}--}}
            <a class="color-black" href="{{ route('getProfile', $item->id) }}">
                <div class="col-sm-3 height-350 hover-border border-white padding">
                    <div class="margin-top-bottom">
                        <div class="">
                        @if($item['picture']['picture_url'])
                            <img class="max-height-350 img-responsive img-circle" src={{$item['picture']->picture_url}} alt="">
                        @else
                            <img class="max-height-350 img-responsive img-circle" src="/img/no-pic.jpg" alt="">
                        @endif
                        </div>
                        <div class="text-center padding-top-10">
                        <strong>
                        <p class="text-capitalize">{{$item->surname}}</p>
                        <br>
                        {{$item->city}}
                        <br>
                        {{$item->compare}}% matching
                        </strong>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
    </div>
    
@stop

