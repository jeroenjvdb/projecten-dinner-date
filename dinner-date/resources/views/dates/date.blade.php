@extends('master')

@section('title')
    Date
@endsection

@section('body')
    <h1 class="white font-size-50 margin-top-0">Date with
        <a class="color-black white" href="{{ route('getProfile', $date->user_id ) }}">
            {{$date->user_name}} {{$date->name}}
        </a>
    </h1>
    <div class=" jumbotron row">
        <div class="col-sm-5">
            <img src="{{$date->photo_url}}" class="max-height-290 img-responsive " alt="photo dish">
        </div>
        <div class="col-sm-6">
            @if($date->user_id != Auth::id())
            <div class="col-sm-12">
                @if(count($request)==0)
                    <a href="{{ route('addByDate', ['id' => $date->user_id, 'date_id'=>$date->id]) }}">
                        <div class="green font-25">
                            <span class="fa fa-heart"></span>
                            I want to go on this date
                        </div>
                    </a>
                @else
                    <div class="red font-25">
                        <span class="fa fa-heart"></span>
                        Date has been proposed.
                    </div>
                @endif
            </div>
            @endif
            <h2>{{$date->dish_name}}</h2>

            <h3>Preference:</h3>
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
            <h3>The date:</h3>
            <p>
                {{ $date->description,0,100 }}
            </p>
            <p>
                {{$date->date}} <br>
                {{$date->area}}
            </p>
        </div>
    </div>
    <h1>
        <a class="color-black" href="{{ URL::previous() }}">
            <small class="start-sentence">Back</small>
        </a>
    </h1>

@endsection