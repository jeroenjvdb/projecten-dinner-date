<?php

namespace App\Http\Controllers;

use App\Dish;
use Auth;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DishController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        $data = ['dishes' => $dishes];

        return View('dishes.dishes')->with($data);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
                'name'          => 'required',
                'sDescription'  => 'required',
                'difficulty'    => 'required',
                'ingredients'   => 'required',
                'preparations'  => 'required',
                'fittingDrinks' => 'required',
                'duration'      => 'required',
                'picture'       => 'required|mimes:jpeg,gif,png',
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Dish::create([
            'name'          => $data['name'],
            'sDescription'  => $data['sDescription'],
            'difficulty'    => $data['difficulty'],
            'ingredients'   => $data['ingredients'],
            'preparations'  => $data['preparations'],
            'fittingDrinks' => $data['fittingDrinks'],
            'duration'      => $data['duration'],
            'photo_url'     => $data['photo_url'],
            'user_id'       => Auth::user()->id,
        ]);
    }

    public function getCreate()
    {
        return View('dishes.create');
    }

    public function postCreate(Request $request)
    {
        $inputData              = $request->all();
        //TODO add photo
        $validate   = $this->validator($inputData);
        
        if($validate->fails())
        {
            return redirect()->back()->withInput()->withErrors($validate->errors());;
        } else{

            $destinationPath        = 'img/dishes/' . Auth::user()->id . '/';
            if(!file_exists($destinationPath))
            {
                mkdir($destinationPath, 0700, true);
            }
            $pic                = $request->file('picture');
            $extension          = $pic->getClientOriginalExtension();
            $fileName           = rand(11111,99999).'.'.$extension; // renameing image random name
            //fullpath = path to picture + filename + extension
            $fullPath           = $destinationPath . $fileName;   

            $pic->move($destinationPath , $fileName); 

            $inputData['photo_url'] = '/' . $fullPath;

            $this->create($inputData);
            return redirect()->route('dishIndex')->withSuccess('succesfully added a dish');
        }
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
        $dish = Dish::findorfail($id);

        $ingredientArray = explode(';', $dish->ingredients);
            
        foreach ($ingredientArray as $key => $value) {

            if($value == "")
            {
                unset($favoriteDish[$key]);
            }
        }

        $dish->ingredientArray = $ingredientArray;

        $data = ['dish' => $dish];
        return view('dishes.index')->with($data);
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
    
}
