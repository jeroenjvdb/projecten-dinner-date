<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Friend;
use DB;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Friend
     */
    protected $friend;

    /**
     * FriendController constructor.
     * @param Friend $friend
     */
    public function __construct(User $user,Friend $friend)
    {
        $this->user = $user;
        $this->friend = $friend;
    }

    public function getRequests()
    {
        $friends = $this->user->find(Auth::id())
            ->friends()
            ->get() ;
        $friendRequests = $this->friend->GetRequests(Auth::id());

        $data =[
            'friends' => $friends,
            'friendRequests' => $friendRequests,
        ];

        return view('functions.friendrequest')->with($data);
    }

    /**
     * @param $id
     * @return $this
     */
    public function addFriend($id)
    {
        if(!($this->friend->where('user_id', '=',Auth::user()->id)
                ->where('friend_id', '=',  $id)
                ->exists() ||
            $id == Auth::user()->id))
        {
            $friend = new Friend;
            $friend->user_id = Auth::user()->id;
            $friend->friend_id = $id;
            $friend->accepted = 0;
            $friend->save();

            return redirect()->back()->withSuccess('friendrequest sent.');
        } else {

            return redirect()->back()->withErrors(['something went wrong']);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function acceptFriend($id)
    {
        $friendRequest = Friend::where('user_id', '=', $id)
            ->where('friend_id', '=', Auth::user()->id)
            ->where('accepted', '=', false)
            ->firstOrFail();
        $friendRequest->accepted = true;
        $friendRequest->save();
        $friend = new Friend;
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $friendRequest->user_id;
        $friend->accepted = true;
        $friend->save();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFriendRequest($id)
    {
        $this->friend->where('user_id', '=', $id)
            ->where('friend_id', '=', Auth::user()->id)
            ->delete();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFriend($id)
    {
        $this->friend->Delete($id);
        $this->friend->Delete(Auth::id());

        return redirect()->back();
    }
}