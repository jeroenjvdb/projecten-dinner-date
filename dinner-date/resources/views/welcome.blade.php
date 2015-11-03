@extends('master')

@section('noContainer')
        <!-- use jssor.slider-20.debug.js instead for debug -->
    <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $AutoPlayInterval: 5000,
              $SlideDuration: 800,
              //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                $SlideHeight: 800,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
             
              $SlideEasing: $Jease$.$OutQuint,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              // $BulletNavigatorOptions: {
              //   $Class: $JssorBulletNavigator$
              // }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
    </style>


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
@stop

@section('body')
    <div class="container">
        {{-- <div class="content"> --}}
            <div class="inPictures">
            @include('Auth.registerForm');
        	</div>
            <div class="title">dinner date</div>
            <div id="description">
            	<p>
            		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae pellentesque orci. Sed egestas turpis felis, eget scelerisque nulla pretium at. Curabitur ac est urna. Integer sollicitudin tortor leo, at blandit ligula bibendum sed. Duis mollis justo sed erat aliquet semper. Aenean laoreet aliquet turpis, sit amet tincidunt leo vulputate eget. Praesent finibus mauris vitae augue facilisis, sed cursus erat malesuada. Curabitur eu malesuada arcu, ac sagittis leo. Suspendisse luctus lectus felis, ut maximus lorem dictum a. Phasellus ut dui tortor. Aliquam tellus ipsum, venenatis eget hendrerit eget, aliquet at mauris. Sed vehicula tellus et scelerisque tempus. Nam nunc eros, cursus non vehicula ac, elementum in leo. Vestibulum a mauris non turpis commodo aliquam eget quis leo. Nulla egestas magna vel augue posuere, non finibus enim malesuada.
            	</p>
            </div>
            <div id="tipsAndTricks">
            	<h2>Tips and Tricks</h2>
            	@include('dishes.partialDish')
            </div>
        {{-- </div> --}}
    </div>
@stop

@section('scripts')
	<script type="text/javascript" src="/js/jssor.slider-20.min.js"></script>
   
@stop