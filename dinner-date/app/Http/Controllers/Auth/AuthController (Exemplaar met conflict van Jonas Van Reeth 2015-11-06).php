<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

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
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() //alleen op als gast tenzij mdt de loguit link
    {
        $this->middleware('guest', ['except' => 'logout']);
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function postLogin()
    {
        if(Auth::attempt(['email' => $_POST['email'], 'password' => $_POST['password'] ]))
        {
            return redirect()->intended('/');
        }
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function register()
    {
        return View('Auth.register');
    }

    public function postRegister(RegisterRequest $request)
    //public function postRegister(Request $request)
    {
        $registerData   = $request->all();

        $user           = new User;

        $user->email    = $registerData['email'];
        $user->password = Hash::make($registerData['password']);
        $user->name     = $registerData['name'];
        $user->surname  = $registerData['surname'];

        $user->save();

        return redirect()->route('home');
    }
}