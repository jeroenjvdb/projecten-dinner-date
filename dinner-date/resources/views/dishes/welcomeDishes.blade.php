
@foreach($dishes as $dish)
    <div class="jumbotron">
    <div class="row">
           <a class="color-black" href="{{'/dish/show/' .  $dish->id}}">
                <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2"><img class="img-responsive" src="{{ $dish->photo_url }}" alt="{{ $dish->name }}"> </div>
                <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
                    <h2>{{ $dish->name }}</h2>
                    <p class="color-black">{{$dish->sDescription}}</p>
                </div>
            </a>

    </div>
    </div>
@endforeach


{{--{{ substr($dish->sDescription,0,100)  }}...--}}