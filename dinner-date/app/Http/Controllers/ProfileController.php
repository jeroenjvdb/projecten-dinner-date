<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Picture;
use Carbon\Carbon;
use App\Friend;
use App\Taste;
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
     * ProfileController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function loadDashboard()
    {
        $images = Picture::where('user_id', '=', Auth::user()->id)
            ->where('isDish', '=', false)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        $profile        = User::find(Auth::user()->id);
        $favoriteDish   = explode(';', $profile->favoriteDish);

        $time   = explode("-", $profile->dateOfBirth);
        $dt     = Carbon::createFromDate($time[0],$time[1],$time[2],'Europe/Brussels');
        $now    = Carbon::today();
        $age    = $now->diffInYears($dt);
        $profile->age =$age;


        foreach ($favoriteDish as $key => $value) {
            if($value == "")
            {
                unset($favoriteDish[$key]);
            }
        }
        $profile->favoriteDishArray = $favoriteDish;
        $friends = User::where('id', '=', Auth::user()->id)->first()->friends()->get() ;
        $friendRequests = Friend::where('friend_id', '=', Auth::user()->id)->where('accepted', '=', false)->get();

        $mayLike=array();

        foreach($profile->tastes as $taste)
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
        //var_dump($CountMayLikes);
        $sortedArray = [];

        foreach ($CountMayLikes as $id => $value) {
            $sortedArray[]=$id;
        }
        //var_dump($sortedArray);
        //give te first 10z
        $pYML = array_slice($sortedArray, 0, 10);

        $people = User::whereIn('id',$pYML)
            // ->select('name','surname','country','city','dateOfBirth','picture_url')
            ->select('id', 'name','surname','country','city','dateOfBirth')
            ->get() ;

        foreach($people as $person)
        {
            // var_dump($person->id);
            $picture_url = Picture::where('user_id',$person->id)
                ->select('picture_url')
                ->first();

            // echo '<pre>';
            // var_dump($picture_url['picture_url']);
            $person->picture_url = $picture_url['picture_url'];

        }

        $smaken = Taste::select('id', 'tastes')->get();
        $tasts =array();
        foreach ($smaken as $smaak) {
            $tasts[$smaak->id]=$smaak->tastes;
        }
        $data   =   ['profile'              => $profile,
            'friends'           => $friends,
            'friendRequests'    => $friendRequests,
            'images'            => $images,
            'tasts'             => $tasts,
            'peoples'           => $people,
        ];

        return View('dashboard')->with($data);
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
        $count = Auth::user()
            ->tastes()
            ->where('user_id',Auth::user()->id)
            ->count();

        $first = Auth::user()
            ->tastes()
            ->where('user_id',Auth::user()->id)
            ->first();

        $delete= $first['pivot']['taste_id'];

        if($count == 4)
        {
            $count =$this->user->tastes()
                ->detach($delete);
        }

        $taste_id =$data['tastes'];
        Auth::user()->tastes()->attach($taste_id);

        return back();
    }

    //////////////////HELPER///////////////////
    /**
     * @param $data
     */
    public function update($data)
    {
        $this->user->find(Auth::user()->id)
            ->update($data);
    }
}
