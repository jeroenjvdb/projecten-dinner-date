<?php
namespace App\Http\Controllers;
/*
models
*/
use App\User;
use App\Friend;
use App\Picture;
use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class MainController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Picture
     */
    protected $picture;

    /**
     * @var Friend
     */
    protected $friend;

    /**
     * MainController constructor.
     * @param User $user
     * @param Picture $picture
     * @param Friend $friend
     */
    public function __construct(User $user, Picture $picture,Friend $friend)
    {
        $this->user = $user;
        $this->picture = $picture;
        $this->friend = $friend;
    }

    /**
     * @param $id
     * @return $this
     */
    public function getProfile($id)
    {
        $user = $this->user->findOrFail($id);
        $images = $this->picture->ProfilePics($id);
        $time   = explode("-", $user->dateOfBirth);
        $dt     = Carbon::createFromDate($time[0],$time[1],$time[2],'Europe/Brussels');
        $now    = Carbon::today();
        $age    = $now->diffInYears($dt); 
        $data = ['profile' => $user, 'images' => $images, 'age' => $age];
        
        return View('profile')->with($data);
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
        $this->friend->where('user_id', '=', $id)
            ->where('friend_id', '=', Auth::user()->id)
            ->delete();
        $this->friend->where('user_id', '=', Auth::user()->id)
            ->where('friend_id', '=', $id)
            ->delete();

        return redirect()->back();
    }
}