@extends('master')

@section('title')
    Dates
@endsection

@section('body')

    @if(isset($random))
        <h1 class="white font-size-50 margin-top-0">Random dates</h1>
    @else
        <h1 class="white font-size-50 margin-top-0">My dates</h1>
    @endif
<div class="jumbotron">
    <div class="row">
        @if(count($dates)==0)
        <h2>You don't have any dates created.</h2>
        @endif
        @if(isset($random))
                <h2 class="blue">Here you find four random dates. <br> Click randomize for four new random dates.</h2>
            <div class="row">
                <div class="col-sm-3 padding-top-botton-10 margin-top-0">
                    <a class="btn btn-default bg-blue white font-size-18" href="{{ route('compare') }}">Randomize</a>
                </div>
            </div>
        @endif
        @foreach($dates as $date)
            <a class="color-black" href="{{'/dates/show/' .  $date->id}}">
                <div class="col-sm-6 dish">
                    {{--{{dd($date)}}--}}
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ $date->photo_url }}" class="img-responsive max-height-290" alt="{{ $date->name }}">
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>{{$date->dish_name}}</h4>
                                    <p>
                                        {{$date->date}} <br>
                                        {{$date->area}}
                                    </p>
                                    <p>
                                        {{ substr($date->description,0,100) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
    {{--@if(count($dishes)==6)--}}
        {{--<div class="row">--}}
            {{--<center>{!! $dishes->render() !!}</center>--}}
        {{--</div>--}}
    {{--@endif--}}
@endsection