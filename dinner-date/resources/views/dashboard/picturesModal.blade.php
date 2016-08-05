<!-- Modal -->
<div id="pictures" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach($images as $index => $image)
                                <li data-target="#myCarousel" data-slide-to="{{$index}}" class="{!! ($index==0?'active':'') !!}"></li>
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @if (count($images) === 0)
                                <div class="item active">
                                        <img src="/img/no-pic.jpg" />
                                </div>
                            @endif
                            @foreach($images as $index => $image)
                                <div class="item {!! ($index==0?'active':'') !!}">
                                    <img src="/{{$image->picture_url}}" alt="">
                                </div>
                            @endforeach
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>





                </div>
            </div>
        </div>

    </div>
</div>



{{--idee: bij smaak: keuken stijl (chinees, japans, ...)--}}