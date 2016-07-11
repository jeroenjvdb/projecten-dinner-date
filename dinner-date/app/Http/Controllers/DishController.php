<?php

namespace App\Http\Controllers;

use App\Dish;
use Auth;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDishRequest;

class DishController extends Controller
{
    /**
     * @var Dish
     */
    protected $dish;

    /**
     * DishController constructor.
     * @param Dish $dish
     */
    public function __construct(Dish $dish)
    {
        $this->dish = $dish;
    }

    /**
     * @return $this
     */
    public function index()
    {
        $data = ['dishes' => $this->dish->all()];

        return View('dishes.dishes')->with($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return View('dishes.create');
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function postCreate(CreateDishRequest $request)
    {
        $data              = $request->all();
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

        $data['photo_url'] = '/' . $fullPath;
        $data['user_id'] = Auth::user()->id;
        $this->dish->create($data);

        return redirect()->route('dishIndex')->withSuccess('succesfully added a dish');
    }

    /**
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        $dish = $this->dish->findorfail($id);
        $ingredientArray = explode(';', $dish->ingredients);
        foreach ($ingredientArray as $key => $value) {

            if($value == "")
            {
                unset($ingredientArray[$key]);
            }
        }

        $dish->ingredientArray = $ingredientArray;
        $data = ['dish' => $dish];

        return view('dishes.index')->with($data);
    }
}
