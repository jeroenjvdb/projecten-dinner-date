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
        $today  = Carbon::today();
        $getDishes = $this->dishes->where('user_id', Auth::id())->get();
        $dishes = [];
        foreach ($getDishes as $dish) {
            $dishes[$dish->id]=$dish->name;
        }
        $data   = [
            'today' => $today,
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
        $data   = $request->all();
        $data['host_id'] = Auth::id();
        $this->date->create($data);

        return redirect()->route('dashboard')->with('success','You succesfully created a date.');
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
        $dates = $this->date->MyDates(Auth::id());
        dd($dates);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $dates = $this->date->join('users','users.id','=','dates.host_id');
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
        $dates = $dates->get();
//        dd($dates);
//        afbeeldingen ophalen van persoon ophalen
        foreach ($dates as $date) {
         $date->pic = $date->pictures()
             ->where('isDish','<>','1')
             ->first();
        }
        return response()->json($dates);
    }
}
