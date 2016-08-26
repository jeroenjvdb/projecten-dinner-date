@extends('master')

@section('noContainer')
        <!-- use jssor.slider-20.debug.js instead for debug -->
    <script src="js/slider-settings.js"></script>

    <link rel="stylesheet" href="/css/style.css">


    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 800px; overflow: hidden;">
            <div style="display: none;">
                <img data-u="image" src="img/cook.jpg" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="img/dinner.jpg" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="img/dish.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:6px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
{{--         <span data-u="arrowleft" class="jssora22l" style="top:123px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:123px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
 --}}        <a href="http://www.jssor.com" style="display:none">Jssor Slider</a>
    </div>
@endsection

@section('body')
            @include('Auth.registerForm',array('before' => $before))
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-2 col-md-2 text-center ">
                        <i class="fa fa-heart fa-5x red " aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-10 col-md-10">
                        <h2 class="text-capitalize">For the romantics</h2>
                        <div id="description">
                            <p class="font-size-18">Welcom at Dinner Date, the dating site with taste!
                                Traditional datingsites tries to match you based on your favorite shows, interest,...
                                But at Dinner Date we gonna let you find that out on your own,
                                we are gonna match you up with someone with the same taste in food!
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-2 col-md-2">
                       <img class="img-responsive img-circle" src="http://daisybrand.com/assets/images/recipes/recipe-images/PANNA%20COTTA%20W%20STRAWBERRY%20SAUCE%20770x628_5314.jpg" alt="">
                    </div>
                    <div class="col-sm-10 col-md-10">
                        <h2 class="text-capitalize">For the food lovers</h2>
                        <p>
                            Don't want a romantic evening? You just want a cozy evening dining and get to know someone new?
                            Learn about new dishes? Even that is possible at Dinner Date!
                        </p>
                    </div>
                </div>
            </div>

            {{--<div class="jumbotron" id="tipsAndTricks">--}}
            	<h2 class="white margin-top-bottom-10">Inspirational dishes</h2>
            	@include('dishes.welcomeDishes')
            {{--</div>--}}
@endsection

@section('scripts')
	<script type="text/javascript" src="/js/jssor.slider-20.min.js"></script>
@endsection