<div class="col-sm-3 height-350  hover-border border-white padding">
    <div class="margin-top-bottom">
        <a class="color-black" href="{{ route('getProfile', $fQ->user->id) }}">
            <div class="">
                @if($fQ->user->picture_url)
                    <img class="max-height-350 img-responsive img-circle" src={{$fQ->user->picture_url}} alt="">
                @else
                    <img class="max-height-350 img-responsive img-circle" src="/img/no-pic.jpg" alt="">
                @endif
            </div>
            <div class="text-center padding-top-10">
                <strong>
                    {{$fQ->user->name}}
                    <br>
                    {{$fQ->user->city}}
                </strong>
            </div>
        </a>
        <div class="row">
            <div class="col-sm-12">
                <a class="green-heart" href="{{ route('acceptFriend', [$fQ->user->id]) }}">
                    <div class="text-center font-25">
                        <span class="fa fa-heart"></span>
                        Accept
                    </div>
                </a>
            </div>
            <div class="col-sm-12">
                <a class="blue" href="{{ route('deleteFriendRequest', [$fQ->user->id]) }}">
                    <div class="text-center font-25">
                        <span class="fa fa-close"></span>
                        Decline
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>