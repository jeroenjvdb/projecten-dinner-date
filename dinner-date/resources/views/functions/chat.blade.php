@extends('master')

@section('title')
    Chat
@stop

@section('body')
    <h1 class="margin-top-0 white font-size-50">Daters and chat</h1>
    <div class="jumbotron">
        @if(count($friends) == 0)
            <div class="row"><h3 class="blue">You haven't found any daters yet.</h3></div>
        @else
            <div class="row blue"> <h3>Start chatting! Make this date happen!</h3><br></div>
        @endif
    <div class="row" id="chatbox">
    <div id="chatPersons" class="col-md-4 overflow-auto max-height-500">
        @foreach($friends as $friend)
            {{--@for($i = 0; $i<5;$i++)--}}
                <div class="row">
                    <div class="col-md-7 padding-bottom-10">
                        @if(count($friend->pictures))
                            <img src="{{ $friend->pictures->first()['picture_url'] }}" class=" " alt="">
                        @else
                            <img src="/img/no-pic.jpg" alt="">
                        @endif
                    </div>
                    <div class="col-md-5">
                        <div class="row padding-bottom-10">
                        <a class="color-black" href="{{ route('getProfile', $friend->id) }}">
                        {{ $friend->surname }} {{ $friend->name }}
                            </a>
                            @if($friend->seen == 0)
                                <i class="fa fa-envelope" id="message" aria-hidden="true"></i>
                            @endif
                        </div>
                        @if($friend->seen == 0)
                        <div class="row">
                            <i class="fa fa-envelope" id="message" aria-hidden="true"></i>
                        </div>
                        @endif
                        <div class="row padding-top-10">
                            <a  class="btn btn-default bg-blue white chatPerson width-100pc" id="{{ $friend->id }}">chat</a>
                        </div>
                        <div class="row padding-top-10">
                            <a  class="btn btn-danger width-100pc" href="{{ route('deleteFriend',['id'=>$friend->id]) }}">delete</a>
                        </div>
                    </div>
                </div>
            {{--@endfor--}}
        @endforeach
    </div>
    <div id="chatForm" class="col-md-8">
    </div>
    {{-- {!! Form::close() !!} --}}

    </div>
    </div>
    <script>
        $(document).ready(function(){
        });
    </script>

@stop

@section('header')
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
@stop

@section('scripts')
    <script src="js/changeProfile.js"></script>
    <script src="js/getChat.js"></script>
    {{--<script src="/js/chat.js"></script>--}}
@stop
