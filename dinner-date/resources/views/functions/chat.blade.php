@extends('master')

@section('title')
    Chat
@stop

@section('body')
    <h1>Daters and chat</h1>
    <div id="chatbox">
    {{-- {!! Form::open(['url' => '/home/chat/post/1']) !!} --}}
    <div id="chatPersons" class="col-md-3">
        @foreach($friends as $friend)
            <div class="row">
                <div class="col-md-12 chatPerson" id="{{ $friend->id }}">
                    <div class="row">
                        <div class="col-md-6 ">
                            @if(count($friend->pictures))
                                <img class="height-200" src="{{ $friend->pictures->first()['picture_url'] }}" alt="">
                            @else
                                <img src="/img/no-pic.jpg" alt="">
                            @endif
                        </div>
                        <div class="col-md-6">
                            {{ $friend->surname }} {{ $friend->name }}
                            <br><br>

                            <a  class="btn btn-danger" href="{{ route('deleteFriend',['id'=>$friend->id]) }}">delete</a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <div id="chatForm" class="col-sm-9">
    </div>
    {{-- {!! Form::close() !!} --}}

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
@stop
