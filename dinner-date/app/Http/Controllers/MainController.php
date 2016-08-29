<?php
namespace App\Http\Controllers;
/*
models
*/
use App\User;
use App\Friend;
use App\Picture;
use Carbon\Carbon;
use App\Dish;
use DB;
use Auth;
use App\FoodProfile;
use App\visitors;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PragmaRX\Tracker\Vendor\Laravel\Facade as Tracker;
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
     * @var FoodProfile
     */
    protected $fProfile;

    /**
     * @var Dishes
     */
    protected $dishes;

    /**
     * @var Visitors
     */
    protected $visitors;

    /**
     * MainController constructor.
     * @param User $user
     * @param Picture $picture
     * @param Friend $friend
     * @param FoodProfile $fProfile
     * @param Dish $dishes
     * @param Visitors $visitors
     */
    public function __construct(
        User $user,
        Picture $picture,
        Friend $friend,
        FoodProfile $fProfile,
        Dish $dishes,
        Visitors $visitors
    )
    {
        $this->user = $user;
        $this->picture = $picture;
        $this->friend = $friend;
        $this->fProfile = $fProfile;
        $this->dishes = $dishes;
        $this->visitors = $visitors;
    }

    /**
     * @param $id
     * @return $this
     */
    public function getProfile($id)
    {
        $user = $this->user->findOrFail($id);
        if ($user->id == Auth::id())
        {
            return redirect()->route('dashboard');
        }

        $this->addVisitors($id);


        $user->age =$this->user->Age($id);
        $images = $this->picture->ProfilePics($id);
        $time   = explode("-", $user->dateOfBirth);
        $dt     = Carbon::createFromDate($time[0],$time[1],$time[2],'Europe/Brussels');
        $now    = Carbon::today();
        $age    = $now->diffInYears($dt);
        $foodprofile = $this->fProfile->where('user_id',$id)->first();
        $dishes = $this->dishes->where('user_id',$id)->take(4)->get();

        $checkFriend = $this->friend->where('user_id',Auth::id())
            ->where('friend_id',$id)
            ->first();

        $friend = 0;
        if(count($checkFriend)>0){
            $friend = 1;
        }

        $data = [
            'profile' => $user,
            'images' => $images,
            'age' => $age,
            'foodprofile' => $foodprofile,
            'dishes' => $dishes,
            'friend' => $friend,
        ];
        
        return View('dashboard.profile')->with($data);
    }


    public function addVisitors($id)
    {
        $data = [
            'visitor' => Auth::id(),
            'visited' => $id,
        ];

        $visitors = $this->visitors->firstOrCreate($data);
        $visitors->count = $visitors->count+1;
        $visitors->save();

        return $visitors;
    }
}