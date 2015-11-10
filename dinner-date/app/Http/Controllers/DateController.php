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

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today  = Carbon::today();
        $data   = array('today' => $today );

        return view('createdate')->with($data);
    }

   //date aanmaken
    public function create(Request $request)
    {
        // controle op input nieuwe date
        $this->validate($request, [
            'dateOfDate'            => 'required|date|after:' . Carbon::today()->subDay(),
            'area'                  => 'required|max:255',
            'nameDish'              => 'required|max:255',
            'description'           => 'required|min:20',
            'preference'            => 'required|numeric',
            'typeOfDate'            => 'required|numeric',
         ]);

        $inputData   = $request->all(); //data ophalen

        // nieuze date toevoegen aan db
        $date           = new Date;

        $date->date                = $inputData['dateOfDate'];
        $date->area                = $inputData['area'];
        $date->name_dish           = $inputData['nameDish'];
        $date->description         = $inputData['description'];
        $date->preference          = $inputData['preference'];
        $date->typeOfDate          = $inputData['typeOfDate'];
        $date->host_id             = Auth::id() ;        

        $date->save();
        return redirect()->route('dashboard');
    }
}
