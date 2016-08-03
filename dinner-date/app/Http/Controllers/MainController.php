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
     * @var FoodProfile
     */
    protected $fProfile;

    /**
     * @var Dishes
     */
    protected $dishes;

    /**
     * MainController constructor.
     * @param User $user
     * @param Picture $picture
     * @param Friend $friend
     * @param FoodProfile $fProfile
     * @param Dish $dishes
     */
    public function __construct(
        User $user,
        Picture $picture,
        Friend $friend,
        FoodProfile $fProfile,
        Dish $dishes
    )
    {
        $this->user = $user;
        $this->picture = $picture;
        $this->friend = $friend;
        $this->fProfile = $fProfile;
        $this->dishes = $dishes;
    }

    /**
     * @param $id
     * @return $this
     */
    public function getProfile($id)
    {
        $user = $this->user->findOrFail($id);
        $user->age =$this->user->Age($id);
        $images = $this->picture->ProfilePics($id);
        $time   = explode("-", $user->dateOfBirth);
        $dt     = Carbon::createFromDate($time[0],$time[1],$time[2],'Europe/Brussels');
        $now    = Carbon::today();
        $age    = $now->diffInYears($dt);
        $foodprofile = $this->fProfile->where('user_id',$id)->first();
        $dishes = $this->dishes->where('user_id',$id)->take(4)->get();

        $data = [
            'profile' => $user,
            'images' => $images,
            'age' => $age,
            'foodprofile' => $foodprofile,
            'dishes' => $dishes,
        ];
        
        return View('dashboard.profile')->with($data);
    }
}