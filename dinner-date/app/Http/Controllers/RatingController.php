<?php

namespace App\Http\Controllers;

use App\Rating;
use Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    /**
     * @var Rating
     */
    protected $rating;

    /**
     * RatingController constructor.
     * @param Rating $rating
     */
    public function __construct(Rating $rating)
    {
        $this->rating = $rating;
    }

    /**
     * @param $dishId
     * @param $rating
     * @return $this
     */
    public function getCreate($dishId, $rating)
    {
        $findRating = $this->rating->FindRating($dishId,Auth::user()->id);

        if(0 <= $rating && $rating <= 5)
        {
            if($findRating->count()){
                $findRating->update(['rating' => $rating]);
            }else{
                $data = [
                    'dish_id' => $dishId,
                    'rating' => $rating,
                    'rater_id' => Auth::user()->id
                ];

                $this->rating->create($data);
            }

            return redirect()->back()->withSuccess('you have rated this dish');
        } else
        {
            return redirect()->back()->withErrors(['something went wrong with your vote']);
        }
    }
}
