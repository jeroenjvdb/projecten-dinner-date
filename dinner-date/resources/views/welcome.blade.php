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
    <div class="container">
        {{-- <div class="content"> --}}
            <div class="inPictures col-md-4">
            @include('Auth.registerForm',array('before' => $before))
        	</div>
            <div class="title">dinner date</div>
            <div id="description">
            	<p>
                    Welkom bij Dinner Date, de dating site met smaak!
                    <br \>Waar traditionele datingsites gaan kijken wie er het beste past bij jou vanwege je favoriete hobbys, interesses,...
                    <br \>Gaan wij bij Dinner Date dit aan jullie overlaten om erachter te komen of jullie gemeenschappelijke interesses hebben.
                    <br \>Wij helpen jullie mensen zoeken die dezelfde smaak hebben als jullie.
                    <br \>Maak een profiel aan, vul je info in, vul je smaken in, maak een date gelegeheid aan en vind jou toekomstige over een maaltijd.
                    <br \>
                    <br \>Geen zin in een romatisch avond, maar eerder in een avond gezellig tafelen en nieuwe mensen leren kennen. Dit kan ook hier perfect.
                    <br \>
                    <br \>Meld je aan en eet smakelijk!
            	</p>
            </div>
            <div id="tipsAndTricks">
            	<h2>Tips and Tricks</h2>
            	@include('dishes.partialDish')
            </div>
        {{-- </div> --}}
    </div>
@endsection

@section('scripts')
	<script type="text/javascript" src="/js/jssor.slider-20.min.js"></script>
@endsection