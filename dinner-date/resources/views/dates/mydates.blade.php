@extends('master')

@section('title')
    My Dates
@endsection

@section('body')

    <div class="row">
        @foreach($dates as $date)
            <a class="color-black" href="{{'/dates/show/' .  $date->id}}">
                <div class="col-sm-6 dish">
                    {{--{{dd($date)}}--}}
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ $date->photo_url }}" class="img-responsive" alt="{{ $date->name }}">
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>{{$date->dish_name}}</h4>
                                    <p>
                                        {{$date->date}} -
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
    {{--@if(count($dishes)==6)--}}
        {{--<div class="row">--}}
            {{--<center>{!! $dishes->render() !!}</center>--}}
        {{--</div>--}}
    {{--@endif--}}
@endsection