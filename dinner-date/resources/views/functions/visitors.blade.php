@extends('master')

@section('title')
    visitors
@stop

@section('body')
    <h1 class="font-size-50 white margin-top-0">Today's visitors </h1>
    <div class="jumbotron">
        <div class="row">
            @foreach($visitors as $key => $item)
                {{--{{dd($item)}}--}}
                <a class="color-black" href="{{ route('getProfile', $item->visitor) }}">
                    <div class="col-sm-3 height-350 hover-border border-white padding">
                        <div class="margin-top-bottom">
                            <div class="">
                                @if($item['picture']['picture_url'])
                                    <img class="max-height-350 img-responsive img-circle" src="/{{$item['picture']['picture_url']}}" alt="">
                                @else
                                    <img class="max-height-350 img-responsive img-circle" src="/img/no-pic.jpg" alt="">
                                @endif
                            </div>
                            <div class="text-center padding-top-10">
                                <strong>
                                    <p class="text-capitalize">{{$item->surname}}</p>
                                    <br>
                                    {{$item->city}}
                                </strong>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
    <h1>
        <a class="color-black" href="{{ URL::previous() }}">
            <small class="start-sentence">Back</small>
        </a>
    </h1>

@stop

