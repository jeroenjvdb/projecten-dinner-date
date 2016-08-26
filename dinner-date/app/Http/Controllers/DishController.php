<?php

namespace App\Http\Controllers;

use App\Dish;
use Auth;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDishRequest;
use App\Http\Requests\EditDishRequest;

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
        $dishes = $this->dish->orderByRaw("RAND()")->paginate(6);
        $data = ['dishes' => $dishes];
        return View('dishes.dishes')->with($data);
    }

    /**
     * @return $this
     */
    public function myDishes()
    {
        $dishes = $this->dish->where('user_id',Auth::id())->paginate(6);
        if(count($dishes)){
            $data = [
                'dishes' => $dishes,
                'my' => true,
            ];

            return View('dishes.dishes')->with($data);
        }else{

            return View('dishes.create');
        }

    }

    /**
     * @param $id
     * @return $this
     */
    public function personDishes($id)
    {
        $dishes = $this->dish->where('user_id',$id)->paginate(6);

        $data = [
            'dishes' => $dishes,
        ];
        return View('dishes.dishes')->with($data);
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return View('dishes.create');
    }

    public function edit($id)
    {
       $dish = $this->dish->where('id',$id)->first();

        return view('dishes.edit')->with(['dish'=>$dish]);
    }

    public function postEdit(EditDishRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->dish->update($data);
        return redirect()->route('myDishes')->withSuccess('succesfully edited dish');

    }
    /**
     * @param CreateDishRequest $request
     * @return mixed
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

        return redirect()->route('myDishes')->withSuccess('succesfully added a dish');
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
        $video = '<iframe width="420" height="315"
                    src="'. $dish->url .'">
                    </iframe>';
        $dish->ingredientArray = $ingredientArray;
        $data = ['dish' => $dish, 'video'=>$video];

        return view('dishes.index')->with($data);
    }

    public function delete($id)
    {
        $dish = $this->dish->find($id);
        if($dish->user_id == Auth::id())
        {
            $dish->delete();
        }
        return redirect()->route('myDishes');
    }

    /**
     * @param $dish_id
     * @return mixed
     */
    public function getUrl($dish_id)
    {
        $dish = $this->dish->findorfail($dish_id);
        return $dish->url;
    }
}
