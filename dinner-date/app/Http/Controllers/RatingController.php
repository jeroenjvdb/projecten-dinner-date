<?php

namespace App\Http\Controllers;

use App\Rating;
use Auth;
use App\Dish;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate($dishId, $rating)
    {
        $data = ['dish' => $dishId, 'rating' => $rating];
        if(Rating::where('dish_id', '=', $dishId)->where('rater_id', '=', Auth::user()->id) || 0 <= $rating || $rating <= 5)
        {
            $ratingObject = new Rating;

            $ratingObject->rating =  $rating;
            $ratingObject->dish_id = $dishId;
            $ratingObject->rater_id = Auth::user()->id;

            $ratingObject->save();
            return redirect()->back()->withSuccess('you have rated this dish');
        } else 
        {
            return redirect()->back()->withErrors(['something went wrong with your vote']);
        }
    }

    public function create(array $data)
    {
        // return Rating::create($data, [
        //         'rating'    => $data['rating'],
        //         'rater_id'  => Auth::user()->id,
        //         'dish_id'   => $data['dish'],
        //     ]);
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
