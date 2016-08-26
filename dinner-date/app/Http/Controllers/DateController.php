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
     * DateController constructor.
     * @param Date $date
     * @param Dish $dishes
     */
    public function __construct(Date $date, Dish $dishes)
    {
        $this->date = $date;
        $this->dishes = $dishes;
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

        return view('dates.date')->with(['date' =>$date]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $dates = $this->date->join('users','users.id','=','dates.host_id')
            ->join('dishes', 'dishes.id', '=', 'dates.dish_id');
        if ($request->type) {
            $dates->where('typeOfDate', '=', $request->type);
        }
        if ($request->date){
            $dates->where('date', '=', $request->date);
        }else{
            $dates->where('date','>=',Carbon::today());
        }
        if ($request->sex){
            $dates->where('users.sex', '=', $request->sex);
        }
        $dates = $dates->ExtraInfoSelect()
            ->get();
        return response()->json($dates);
    }
}
