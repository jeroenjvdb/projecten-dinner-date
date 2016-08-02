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
     * ProfileController constructor.
     * @param User $user
     * @param Picture $picture
     * @param Friend $friend
     * @param Taste $taste
     * @param FoodProfile $fProfile
     */
    public function __construct
    (
        User $user,
        Picture $picture,
        Friend $friend,
        Taste $taste,
        FoodProfile $fProfile
    ){
        $this->user = $user;
        $this->picture = $picture;
        $this->friend = $friend;
        $this->taste = $taste;
        $this->fProfile = $fProfile;
    }

    /**
     * @return $this
     */
    public function loadDashboard()
    {
        $id = Auth::user()->id;
        
        $images = $this->picture->ProfilePics($id);
        $profile = $this->user->find($id);
        $friends = $this->user->find($id)
            ->friends()
            ->get() ;
        $friendRequests = $this->friend->GetRequests($id);
        $profile->age =$this->user->Age($id);
        $people = $this->user->SuggestPeople($this->suggestPeople());
        foreach($people as $person) {
            $picture_url = $this->picture->where('user_id',$person->id)
                ->select('picture_url')
                ->first();
            $person->picture_url = $picture_url['picture_url'];
        }
        $tastes = $this->getTastes();

        $foodprofile = $this->fProfile->where('user_id',Auth::id())->first();
//        dd($foodprofile);
        $data   = [
            'profile' => $profile,
            'friends' => $friends,
            'friendRequests' => $friendRequests,
            'images' => $images,
            'tastes' => $tastes,
            'peoples' => $people,
            'foodprofile' => $foodprofile,
        ];

        $suggestion = $this->suggetions();

        return View('dashboard.dashboard2')->with($data);
    }

    public function compare()
    {
        $people = $this->suggetions();
        $data = [
            'people' => $people,
        ];

        return View('compare')->with($data);
    }
    
    /**
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
//        dd($request->all());
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
    private function suggestPeople()
    {
        $mayLike=[];
        foreach($this->user->find(Auth::user()->id)->tastes as $taste)
        {
            $othersTaste = $taste->users()
                ->where('user_id','<>', Auth::user()->id)
                ->where('taste_id',$taste->id)
                ->get();
            foreach($othersTaste as $user)
            {
                $mayLike[] = $user->id;
            }
        }
        //count how many times an id apears in array
        $CountMayLikes = array_count_values($mayLike);
        //sort from high to low
        arsort($CountMayLikes);
        $sortedArray = [];

        foreach ($CountMayLikes as $id => $value) {
            $sortedArray[]=$id;
        }
        //give te first 10
        $pYML = array_slice($sortedArray, 0, 10);
        return $pYML;
    }


    public function suggetions()
    {
        $user = $this->fProfile->where('user_id',Auth::id())->first();
        $others = $this->fProfile->where('user_id','<>',Auth::id())->get();
        $results= [];
        foreach($others as $key => $profile){
            $count = 0;
            foreach ($profile->toArray() as $key => $value) {
                if($user[$key] == $value) {
                    $count++;
                }
            }
            $results[] = [
                'user' => $this->user->find($profile->user_id),
                'picture' => $this->picture->where('user_id','=',$profile->user_id)
                    ->where('isDish','=',0)
                    ->select('picture_url')
                    ->first(),
                'matching' => round($count/19*100),
            ];
        }
        return $results;
    }
}
