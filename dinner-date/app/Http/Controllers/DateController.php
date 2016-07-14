<?php

namespace App\Http\Controllers;

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
     * DateController constructor.
     * @param Date $date
     */
    public function __construct(Date $date)
    {
        $this->date = $date;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today  = Carbon::today();
        $data   = [
            'today' => $today,
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

        return redirect()->route('dashboard.dashboard');
    }

    /**
     * @return $this
     */
    public function getSearch()
    {
        $dates = Date::all();
        $tomorrow = Carbon::tomorrow();
        $data = ['dates' => $dates, 'tomorrow' => $tomorrow];

        return view('dates.search')->with($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $dates = $this->date->join('users','users.id','=','dates.host_id')
            ->where('date','<=',Carbon::today());
        if ($request->type) {
            $dates->where('typeOfDate', '=', $request->type);
        }
        if ($request->date){
            $dates->where('date', '=', $request->date);
        }
        if ($request->sex){
            $dates->where('sex', '=', $request->sex);
        }
        $dates = $dates->get();

        //afbeeldingen ophalen van persoon ophalen
        foreach ($dates as $date) {
         $date->pic = $date->pictures()
             ->where('isDish','<>','1')
             ->first();
        }

        return response()->json($dates);
    }
}
