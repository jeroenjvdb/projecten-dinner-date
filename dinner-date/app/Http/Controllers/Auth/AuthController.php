<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\User;
use Auth;
use Hash;
use App\Taste;
use App\Dish;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
     * AuthController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        if(!Auth::attempt(['email' => $_POST['email'], 'password' => $_POST['password'] ]))
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
        $this->user->create($data);
        if(!Auth::attempt(['email' => $data['email'], 'password' => $pass ]))
        {
            $errors = new MessageBag(['login attempt' => ['Email and/or password invalid.']]);
            return redirect()->back()->withInput()->withErrors($errors);
        }

        return redirect()->route('dashboard');
    }
}
