<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Picture;
use App\Friend;
use App\Taste;
use App\FoodProfile;
use App\Dish;
use App\visitors;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateFoodRequest;

class ProfileController extends Controller
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
     * @var Taste
     */
    protected $taste;

    /**
     * @var FoodProfile
     */
    protected $fProfile;

    /**
     * @var Dishes
     */
    protected $dishes;

    /**
     * ProfileController constructor.
     * @param User $user
     * @param Picture $picture
     * @param Friend $friend
     * @param Taste $taste
     * @param FoodProfile $fProfile
     * @param Dish $dishes
     * @param Visitors $visitors
     */
    public function __construct
    (
        User $user,
        Picture $picture,
        Friend $friend,
        Taste $taste,
        FoodProfile $fProfile,
        Dish $dishes,
        Visitors $visitors
    ){
        $this->user = $user;
        $this->picture = $picture;
        $this->friend = $friend;
        $this->taste = $taste;
        $this->fProfile = $fProfile;
        $this->dishes = $dishes;
        $this->visitors = $visitors;
    }

    /**
     * @return $this
     */
    public function loadDashboard()
    {
        $id = Auth::id();
        $visitorsToday = $this->visitors->checkToday($id);
        $visitorsToday = count($visitorsToday);
        $daterequests = $this->friend->GetRequests($id);
        $daters = $this->friend->GetFriends($id);
        $images = $this->picture->ProfilePics($id);
        $profile = $this->user->find($id);
        $profile->age = $this->user->Age($id);
        $tastes = $this->getTastes();

        $foodprofile = $this->fProfile->where('user_id',Auth::id())->first();
        $dishes = $this->dishes->where('user_id',$id)->take(4)->get();


        $data   = [
            'profile' => $profile,
            'images' => $images,
            'tastes' => $tastes,
            'foodprofile' => $foodprofile,
            'dishes' => $dishes,
            'visitorsToday' => $visitorsToday,
            'daterequests' => count($daterequests),
            'daters' => count($daterequests),
        ];

        return View('dashboard.dashboard2')->with($data);
    }

    public function compare()
    {
        $people = $this->suggetions();
        $data = [
            'people' => $people,
        ];

        return View('functions.compare')->with($data);
    }
    
    /**
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $this->update($request->all());

        return back();
    }

    /**
     * @param UpdateFoodRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateFood(UpdateFoodRequest $request)
    {
        $this->update($request->all());

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTaste(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
     $this->fProfile->where('user_id',Auth::id())
            ->update($data);
        return back();
    }

    //////////////////HELPER///////////////////
    /**
     * @param $data
     */
    private function update($data)
    {
//        dd($data);
        $this->user->find(Auth::user()->id)
            ->update($data);
    }

    /**
     * @return array
     */
    private function getTastes()
    {
        $smaken = $this->taste->select('id', 'tastes')->get();
        $tasts = [];
        foreach ($smaken as $smaak) {
            $tasts[$smaak->id]=$smaak->tastes;
        }
        return $tasts;
    }

    /**
     * @return array
     */
    public function suggetions()
    {
        $others = $this->user->Get8()
            ->get();
        foreach($others as $key => $profile){
            $fProfile = $this->fProfile
                ->where('user_id','=',$profile->id)
                ->first();
            $userProfile = $this->fProfile
                ->where('user_id','=',Auth::id())
                ->first();
            $count = 0;
            foreach ($fProfile->toArray() as $key => $value) {
                if($key!='id' || $key!='user_id' || $key!='updated_at' || $key!='created_at' ) {
                    if ($userProfile[$key] == $value) {
                        $count++;
                    }
                }
            }
            $results[] = [
                'user' => $profile,
                'picture' => $this->picture->where('user_id','=',$profile->user_id)
                    ->where('isDish','=',0)
                    ->select('picture_url')
                    ->first(),
                'matching' => round($count/19*100),
            ];
        }
        return $results;
    }


    public function visitors()
    {
//        dd('test');
        $visitors = $this->visitors->GetUsers(Auth::id())->get();

        foreach ($visitors as $key => $item) {
            $item->picture = $this->picture->where('user_id','=',$item->visitor)
                ->where('isDish','=',0)
                ->select('picture_url')
                ->first();
        }

//        dd($visitors);
        $data = [
            'visitors' => $visitors,
        ];

        return view('functions.visitors')->with($data);
    }
}
