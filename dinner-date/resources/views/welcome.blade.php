@extends('master')

@section('body')
    <div class="container">
        <div class="content">
            <div class="title">Laravel 5</div>
            @include('Auth.registerForm');
        </div>
    </div>
@stop