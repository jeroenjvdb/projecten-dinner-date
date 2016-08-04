<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\FoodProfile;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateFoodRequest;

class SetupController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var FoodProfile
     */
    protected $fProfile;

    /**
     * SetupController constructor.
     * @param User $user
     * @param FoodProfile $fProfile
     */
    public function __construct(User $user, FoodProfile $fProfile)
    {
        $this->user = $user;
        $this->fProfile = $fProfile;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step1()
    {
        return view('Auth.setup.step1');
    }

    //////////////////HELPER///////////////////

    /**
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $this->update($request->all());

        return view('Auth.setup.step2');
    }

    /**
     * @param UpdateFoodRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateFood(UpdateFoodRequest $request)
    {
        $this->update($request->all());

        return view('Auth.setup.step3');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTaste(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->fProfile->where('user_id',Auth::id())
            ->update($data);
        return redirect()->route('dashboard');
    }

    //////////////////HELPER///////////////////
    /**
     * @param $data
     */
    private function update($data)
    {
//        dd($data);
        $this->user->find(Auth::user()->id)
            ->update($data);
    }
}
