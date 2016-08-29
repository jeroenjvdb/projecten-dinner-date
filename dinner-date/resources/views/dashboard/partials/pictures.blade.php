<div class="row">
    <div class="col-md-offset-4 col-md-4 profile-pics text-center">
        <div >
            @if (count($images) === 0)
                <div class="row">
                    <div class="col-md-12">
                        <img src="/img/no-pic.jpg"  class="img-circle"/>
                    </div>
                </div>
                <div class="row more-pics">
                    <div class="col-md-3 hidden-xs">
                        <img src="/img/no-pic.jpg" class="img-circle"/>
                    </div>
                    <div class="row more-pics hidden-xs padding-top-10">
                    <div class="col-md-3">
                        <a class="btn btn-default bg-blue white round" href="{{ route('Photo') }}">
                            <i class="fa fa-plus white" aria-hidden="true"></i></a>
                    </div>
                        </div>
                </div>
            @else
                @foreach($images as $index => $image)
                    @if($index==0)
                        <div class="row">
                            <div class="col-md-12" data-toggle="modal" data-target="#pictures">
                                <img src="{{ $image->picture_url}}" class="img-circle"  autofocus/>
                            </div>
                        </div>
                        <div class="row more-pics hidden-xs padding-top-30">
                            <div class="col-md-offset-2"></div>
                            @else
                                <div class="col-md-3" data-toggle="modal" data-target="#pictures">
                                    <img src="{{ $image->picture_url}}" class="img-circle" />
                                </div>
                            @endif
                            @endforeach
                                <div class="col-md-3">
                                    <a class="btn btn-default bg-blue white round margin-top-5" href="{{ route('Photo') }}">
                                    <i class="fa fa-plus white fa-2x" aria-hidden="true"></i></a>
                                </div>
                        </div>
                    @endif
        </div>
    </div>
</div>