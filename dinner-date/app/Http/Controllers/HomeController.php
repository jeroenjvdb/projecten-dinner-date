<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Dish;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @var Dish
     */
    protected $dish;

    /**
     * HomeController constructor.
     * @param Dish $dish
     */
    public function __construct(Dish $dish)
    {
        $this->dish = $dish;
    }

    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function home()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }else{
            $before =  Carbon::today()->subYears(18)->subDay()->format('Y-m-d');
            $dishes = $this->dish->orderByRaw("RAND()")->take(4)->get();
            $data = array('dishes' => $dishes, 'before' => $before);
            
            return View('welcome')->with($data);
        }
    }
}
