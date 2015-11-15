<?php
namespace App\Http\Controllers;
/*
models
*/
use App\User;
use App\Dish;
use App\Friend;
use App\Picture;
use Carbon\Carbon;
use App\Taste;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class MainController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'home']);
    }
    public function home()
    {
        $before =  Carbon::today()->subYears(18)->format('Y-m-d');
        $dishes = Dish::all()->take(4);
        $data = array('dishes' => $dishes, 'before' => $before);
        return View('welcome')->with($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Picture::where('user_id', '=', Auth::user()->id)
                        ->where('isDish', '=', false)
                        ->orderBy('id', 'desc')
                        ->take(5)
                        ->get();

        $profile = User::find(Auth::user()->id);
        $favoriteDish = explode(';', $profile->favoriteDish);
        
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
        //give te first 10
        $pYML = array_slice($sortedArray, 0, 10);
        
        $people = User::whereIn('id',$pYML)
                    ->select('name','surname','country','city','dateOfBirth')
                    ->get() ;
        

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
    public function dishes()
    {
        $dish = Dish::all()->first();
        // var_dump($dish);
        $data = ['dish' => $dish];
        return View('dish')->with($data);
    }
    public function getProfile($id)
    {
        $user = User::findOrFail($id);
        $data = ['profile' => $user];
        return View('profile')->with($data);
    }
    public function addFriend($id)
    {
        if(!(Friend::where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $id)->exists() ||
            Friend::where('user_id', '=', $id)->where('friend_id', '=', Auth::user()->id)->exists() ||
            $id == Auth::user()->id))
        {
        $friend = new Friend;
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $id;
        $friend->accepted = 0;
        $friend->save();
        return redirect()->back()->withSuccess('friendrequest sent.');
        } else 
        {
            return redirect()->back()->withErrors(['something went wrong']);
        }
    }
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
    public function deleteFriendRequest($id)
    {
        $friendRequest = Friend::where('user_id', '=', $id)
                                    ->where('friend_id', '=', Auth::user()->id);
        $friendRequest->delete();
        return redirect()->back();
    }
    public function deleteFriend($id)
    {
        $userFriend = Friend::where('user_id', '=', $id)
                                    ->where('friend_id', '=', Auth::user()->id);
        $userFriend->delete();
        $friendUser = Friend::where('user_id', '=', Auth::user()->id)
                                    ->where('friend_id', '=', $id);
        $friendUser->delete();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}