<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Dish;

class HomeController extends Controller
{
    /**
     * @var Dish
     */
    protected $dish;
    
    public function __construct(Dish $dish)
    {
        $this->dish = $dish;
    }

    public function home()
    {
        $before =  Carbon::today()->subYears(18)->subDay()->format('Y-m-d');
        $dishes = $this->dish->all()->take(4);
        $data = array('dishes' => $dishes, 'before' => $before);
        return View('welcome')->with($data);
    }
}
