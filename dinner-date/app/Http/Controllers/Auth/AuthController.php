<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\User;
use Auth;
use Hash;
use App\FoodProfile;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\MessageBag;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    | (Exemplaar met conflict van Jonas Van Reeth 2015-11-06)
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var FoodProfile
     */
    protected $fProfile;

    /**
     * AuthController constructor.
     * @param User $user
     * @param FoodProfile $fProfile
     */
    public function __construct(User $user, FoodProfile $fProfile)
    {
        $this->user = $user;
        $this->fProfile = $fProfile;

//        $this->middleware('guest', ['except' => array('logout', 'test')]);
//        in route!!!
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('Auth.login');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return View('Auth.register');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {

        if(!Auth::attempt(['email' => $_POST['email'], 'password' => $_POST['password']],isset($_POST['remember'])))
        {
            $errors = new MessageBag(['login attempt' => ['Email and/or password invalid.']]);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        return redirect()->route('dashboard');
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(RegisterRequest $request)
    {
        $data = $request->all();
        $pass = $data['password'];
        $data['password'] = Hash::make($pass);
        $user = $this->user->create($data);

        $foodprofile =  new FoodProfile;
        $foodprofile->user_id = $user->id;
        $foodprofile->save();

        if(!Auth::attempt(['email' => $data['email'], 'password' => $pass ],True))
        {
            $errors = new MessageBag(['login attempt' => ['Email and/or password invalid.']]);
            return redirect()->back()->withInput()->withErrors($errors);
        }

        return redirect()->route('step1');
    }
}
