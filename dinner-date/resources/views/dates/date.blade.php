@extends('master')

@section('title')
    Date
@endsection

@section('body')
    <h1 class="white font-size-50 margin-top-0">Date
        <br>
        <a class="color-black" href="{{ URL::previous() }}">
            <small class="start-sentence">Back</small>
        </a>
    </h1>
    <div class=" jumbotron row">
        <div class="col-sm-5">
            <img src="{{$date->photo_url}}" alt="photo dish">
        </div>
        <div class="col-sm-6">
            <h3>{{$date->dish_name}}</h3>
            @if($date->user_id != Auth::id())
            <div class="col-sm-12">
                <a href="{{ route('addByDate', ['id' => $date->user_id, 'date_id'=>$date->id]) }}">
                    <div class="green font-25">
                        <span class="fa fa-heart"></span>
                        I want to go on this date
                    </div>
                </a>
            </div>
            @endif
            <h4>Preference:</h4>
            <p>
                @if($date->preference == 0 )
                    man
                @else
                    woman
                @endif
                -
                @if($date->typeOfDate == 1 )
                    romantic diner
                @else
                    pure culinary
                @endif
            </p>
            <h4>The date</h4>
            <p>
                {{ $date->description,0,100 }}
            </p>
            <p>
                {{$date->date}} -
                {{$date->area}}
            </p>

            <h4>With:</h4>
            <a class="" href="{{ route('getProfile', $date->user_id) }}">
                <p>{{$date->user_name}}</p>
            </a>
        </div>
    </div>

@endsection