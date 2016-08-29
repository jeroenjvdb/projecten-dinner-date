@extends('master')

@section('title')
    Chat
@stop

@section('body')
    <h1 class="margin-top-0 white font-size-50">Daters and chat</h1>
    <div class="jumbotron">
    <div class="row" id="chatbox">
    {{-- {!! Form::open(['url' => '/home/chat/post/1']) !!} --}}
    <div id="chatPersons" class="col-md-4 overflow-auto max-height-500">
        @foreach($friends as $friend)
            {{--@for($i = 0; $i<5;$i++)--}}
                <div class="row chatPerson" id="{{ $friend->id }}">
                    <div class="col-md-7 padding-bottom-10">
                        @if(count($friend->pictures))
                            <img src="{{ $friend->pictures->first()['picture_url'] }}" class=" hover-border" alt="">
                        @else
                            <img src="/img/no-pic.jpg" alt="">
                        @endif
                    </div>
                    <div class="col-md-5">
                        <div class="row padding-bottom-10">
                        <a class="color-black" href="{{ route('getProfile', $friend->id) }}">
                        {{ $friend->surname }} {{ $friend->name }}
                            </a>
                        </div>
                        @if($friend->seen == 0)
                        <div class="row">
                            <i class="fa fa-envelope" id="message" aria-hidden="true"></i>
                        </div>
                        @endif
                        <div class="row padding-top-10">
                        <a  class="btn btn-danger" href="{{ route('deleteFriend',['id'=>$friend->id]) }}">delete</a>
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
