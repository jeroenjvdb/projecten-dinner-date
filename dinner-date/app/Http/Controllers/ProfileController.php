<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Picture;
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
     * ProfileController constructor.
     * @param User $user
     * @param Picture $picture
     * @param Friend $friend
     * @param Taste $taste
     */
    public function __construct
    (
        User $user,
        Picture $picture,
        Friend $friend,
        Taste $taste
    ){
        $this->user = $user;
        $this->picture = $picture;
        $this->friend = $friend;
        $this->taste = $taste;
    }

    /**
     * @return $this
     */
    public function loadDashboard()
    {
        $images = $this->picture->ProfilePics(Auth::user()->id);
        $profile = $this->user->find(Auth::user()->id);
        $friends = $this->user->find(Auth::user()->id)
            ->first()
            ->friends()
            ->get() ;
        $friendRequests = $this->friend->GetRequests(Auth::user()->id);
        $profile->age =$this->user->Age(Auth::user()->id);
        $people = $this->user->SuggestPeople($this->suggestPeople());
        foreach($people as $person) {
            $picture_url = Picture::where('user_id',$person->id)
                ->select('picture_url')
                ->first();
            $person->picture_url = $picture_url['picture_url'];
        }
        $tastes = $this->getTastes();
        $data   = [
            'profile' => $profile,
            'friends' => $friends,
            'friendRequests' => $friendRequests,
            'images' => $images,
            'tastes' => $tastes,
            'peoples' => $people,
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

        $delete = $first['pivot']['taste_id'];

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
    private function update($data)
    {
        $this->user->find(Auth::user()->id)
            ->update($data);
    }

    private function getTastes()
    {
        $smaken = $this->taste->where('id', 'tastes')->get();
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
}
