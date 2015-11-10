<?php

namespace App\Http\Controllers;
/*
models
*/
use App\User;
use App\Dish;

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
        $profile = User::find(Auth::user()->id);
        $favoriteDish = explode(';', $profile->favoriteDish);
        
        foreach ($favoriteDish as $key => $value) {

            if($value == "")
            {
                unset($favoriteDish[$key]);
            }
        }
        $profile->favoriteDishArray = $favoriteDish;
        // $dish = Dish::all()->first();
        $data   =   ['profile' => $profile];
        return View('dashboard')->with($data);
    }

    public function dishes()
    {
        $dish = Dish::all()->first();
        // var_dump($dish);
        $data = ['dish' => $dish];

        return View('dish')->with($data);
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
