@foreach($friendRequests as $friendRequest)
    <div class="row">
        <div class="col-md-2">
            <img src="" alt="">
        </div>
        <div class="col-md-6">
            {{$friendRequest->user->fullName()}}
        </div>
        <div class="col-md-2">
            <a href="{{ route('acceptFriend', [$friendRequest->user->id]) }}"><button>accept</button></a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('deleteFriendRequest', [$friendRequest->user->id]) }}"><button>delete</button></a>
        </div>
    </div>
@endForeach