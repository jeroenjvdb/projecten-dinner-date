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

        return view('createdate')->with($data);
    }

   //date aanmaken
    public function create(CreateDateRequest $request)
    {

        $data   = $request->all(); //data ophalen
//        $data['host_id'] = Auth::id();
//        $new = $data;
//
////        dd($new);
////        dd(Auth::id())
//       $this->date->create($new);
        $date           = new Date;

        $date->date                = $data['date'];
        $date->area                = $data['area'];
        $date->name_dish           = $data['name_dish'];
        $date->description         = $data['description'];
        $date->preference          = $data['preference'];
        $date->typeOfDate          = $data['typeOfDate'];
        $date->host_id             = Auth::id() ;

        $date->save();
        return redirect()->route('dashboard');
    }

    public function getSearch()
    {
        $dates = Date::all();
        $data = ['dates' => $dates];

        return view('dates.search')->with($data);
    }

    public function search(Request $request){
        // echo '<pre>';
        // var_dump($request->all());
        // return $request->input('date');
        $dates = Date::all();
        foreach($dates as $date)
        {
            // var_dump($date->typeOfDate);
        }
        if($request->input('type'))
        {
            $newDates = new \Illuminate\Database\Eloquent\Collection;
            switch ($request->input('type')) {
                case 'culinair':
                    foreach($dates as $date)
                    {
                        if($date->typeOfDate == "1")
                        {
                            $newDates->push($date);// = $dates->where('typeOfDate', "1");
                        }
                     }
                    break;
                
                case 'romantic':
                    //$dates = $dates->where('typeOfDate', "2");
                    foreach($dates as $date)
                    {
                        // echo $date->id;
                        if($date->typeOfDate == "2")
                        {
                            // var_dump('romantic');
                            $newDates->push($date);// = $dates->where('typeOfDate', "1");
                        }
                     }
                    break;
            }
            // var_dump($newDates);
            $dates = $newDates;
        }

        if($request->input('date'))
        {
            $newDates = new \Illuminate\Database\Eloquent\Collection;
            foreach ($dates as $date) {
                // echo $date->date;
                if($date->date == $request->input('date'))
                {
                    $newDates->push($date);
                }
            }
            $dates = $newDates;
        }
        if($request->input('sex'))
        {
            $newDates = new \Illuminate\Database\Eloquent\Collection;
            foreach ($dates as $date) {
                if($date->host->sex == $request->input('sex'))
                {
                    $newDates->push($date);
                }
            }
            $dates = $newDates;
        }



        foreach ($dates as $date) {
            // $date->host()->id;
         $date->host = $date->host()->first();
         $date->host->pic = $date->host->pictures()->first();
        }
        // var_dump($dates);
        return response()->json($dates);
        // $dates = Date::all();
        // 
        // $data = ['dates' => $dates];
        // 
        // var_dump($request->all());
        // // var_dump($dates);
        // return view('dates.search')->with($data);
    }
}
