<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//added jonas
use Carbon\Carbon;
use Validator;
use App\Date;
use DB;
use Auth;
use App\Friend;
use App\Http\Requests\CreateDateRequest;

class DateController extends Controller
{
    /**
     * @var Date
     */
    protected $date;

    /**
     * @var Dish
     */
    protected $dishes;

    /**
     * @var Friend
     */
    protected $friend;

    /**
     * DateController constructor.
     * @param Date $date
     * @param Dish $dishes
     * @param Friend $friend
     */
    public function __construct(Date $date, Dish $dishes, Friend $friend)
    {
        $this->date = $date;
        $this->dishes = $dishes;
        $this->friend = $friend;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tomorrow  = Carbon::tomorrow();
        $getDishes = $this->dishes->where('user_id', Auth::id())->get();

        if (count($getDishes) == 0 ){
            return redirect()->route('dishCreate')->withErrors(['no dish'=> 'First create a dish before creating a date.']);
        }

        $dishes = [];
        foreach ($getDishes as $dish) {
            $dishes[$dish->id]=$dish->name;
        }
        $data   = [
            'tomorrow' => $tomorrow,
            'dishes' => $dishes,
        ];

        return view('dates.createdate')->with($data);
    }

    /**
     * @param CreateDateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateDateRequest $request)
    {
        $data = $request->all();
        $data['host_id'] = Auth::id();
        $this->date->create($data);

        return redirect()->route('myDates')->with('success','You succesfully created a date.');
    }

    /**
     * @return $this
     */
    public function getSearch()
    {
        $dates = $this->date->all();
        $tomorrow = Carbon::tomorrow();
        $data = ['dates' => $dates, 'tomorrow' => $tomorrow];

        return view('dates.search')->with($data);
    }

    public function myDates()
    {
        $dates = $this->date->MyDates(Auth::id())
            ->where('date','>=',Carbon::tomorrow())
            ->ExtraInfo()
            ->ExtraInfoSelect()
            ->get();
        if(count($dates)==0)
        {
            return redirect()->route('createDate');
        }

        $data = [
            'dates' => $dates,
        ];

        return view('dates.mydates')->with($data);
    }

    public function show($id)
    {
        $date = $this->date->where('dates.id',$id)
            ->ExtraInfo()
            ->ExtraInfoSelect()
            ->first();

        $request = $this->friend->where('accepted',0)
            ->where('date_id',$id)
            ->where('user_id',Auth::id())
            ->first();

        $data = [
            'request' => $request,
            'date' =>$date,
        ];

        return view('dates.date')->with($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $dates = $this->date->join('users','users.id','=','dates.host_id')
            ->join('dishes', 'dishes.id', '=', 'dates.dish_id')
            ->where('users.id','<>',Auth::id())
            ->where('date','>=',Carbon::today());
        if ($request->type == 0 || $request->type == 1) {
            $dates->where('typeOfDate', '=', $request->type);
        }

        if ($request->sex == 0 || $request->sex == 1){
            $dates->where('users.sex', '=', $request->sex);
        }
        $dates = $dates->ExtraInfoSelect()
            ->get();
        return response()->json($dates);
    }


    public function randomDate()
    {
        $dates = $this->date->where('date','>=',Carbon::tomorrow())
            ->ExtraInfo()
            ->ExtraInfoSelect()
            ->where('users.sex','=',Auth::user()->searchFor)
            ->where('users.id','<>',Auth::id())
            ->orderByRaw("RAND()")
            ->take(4)
            ->get();

//        dd($dates);
        $data = [
            'dates' => $dates,
            'random' => true,
        ];

        return view('dates.mydates')->with($data);
    }
}
