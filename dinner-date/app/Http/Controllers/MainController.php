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
        // echo '<pre>';
        // foreach ($friends as $friend) {
        //     echo 'new user </br>';
        // var_dump($friendRequests->first()->friend);
        // }
        // $dish = Dish::all()->first();
        $data   =   ['profile' => $profile,
                        'friends' => $friends,

                        'friendRequests' => $friendRequests];

                        'images' => $images,
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
