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
use Carbon\Carbon;

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
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => array('logout', 'test')]);
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
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }

    public function register()
    {
        return View('Auth.register');
    }

    public function postRegister(Request $request)
    {
        
        
        $before =  Carbon::today()->subYears(18)->format('Y-m-d');
        
        $registerData   = $request->all();

        $this->validate($request, [
            'email'                 => 'required|unique:users,email',
            'surname'               => 'required|max:255',
            'password'              => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
            'dateOfBirth'           => 'required|date|before:' . $before,
            
         ]);

        $registerData   = $request->all();

        $user           = new User;

        $user->email                = $registerData['email'];
        $user->password             = Hash::make($registerData['password']);
        $user->name                 = $registerData['name'];
        $user->surname              = $registerData['surname'];
        $user->dateOfBirth          = $registerData['dateOfBirth'];
        

        $user->save();

        return redirect()->route('dashboard');
    }

    public function test(Request $request)
    {
        $registerData               = $request->all();
        $type                       = $registerData["type"];
                
        switch($type)
        {
            case "first":
               $this->validate($request, [
                'streetname'            => 'required',
                'housenumber'           => 'required',
                'city'                  => 'required',
                'country'               => 'required',
                'spicyness'             => 'required',
                'favoriteDish'          => 'required',
                'perfectDate'           => 'required|min:20',
                
                 ]);

                $userid                     = Auth::user()->id;


                $user                       = User::find($userid);

                $user->streetname           = $registerData['streetname'];
                $user->housenumber          = $registerData['housenumber'];
                $user->city                 = $registerData['city'];
                $user->country              = $registerData['country'];
                $user->favoriteDish         = $registerData['favoriteDish'];
                $user->specialAllergies     = $registerData['specialAllergies'];
                $user->spicyness            = $registerData['spicyness'];
                $user->perfectDate          = $registerData['perfectDate'];
                
                $user->save();
            break;

            case "food":

                 $this->validate($request, [
                'spicyness'             => 'required',
                'favoriteDish'          => 'required',
                'perfectDate'           => 'required|min:20',
                
                 ]);

                $userid                     = Auth::user()->id;

                $user                       = User::find($userid);

                $user->favoriteDish         = $registerData['favoriteDish'];
                $user->specialAllergies     = $registerData['specialAllergies'];
                $user->spicyness            = $registerData['spicyness'];
                $user->perfectDate          = $registerData['perfectDate'];
                
                $user->save();

            break;

            case "profile":

                    $this->validate($request, [
                    'name'                  => 'required',
                    'surname'               => 'required',
                    'streetname'            => 'required',
                    'housenumber'           => 'required',
                    'city'                  => 'required',
                    'country'               => 'required',
                    
                 ]);

                $userid                     = Auth::user()->id;

                $user                       = User::find($userid);

                $user->surname              = $registerData['surname'];
                $user->name                 = $registerData['name'] ;
                $user->streetname           = $registerData['streetname'];
                $user->housenumber          = $registerData['housenumber'];
                $user->city                 = $registerData['city'];
                $user->country              = $registerData['country'];
                
                $user->save();
            break;
        }         

        return redirect()->route('dashboard');
    }

    public function test2(Request $request)
    {
        echo 'test';

        //  $this->validate($request, [
        //     'spicyness'             => 'required',
        //     'favoriteDish'          => 'required',
        //     'perfectDate'           => 'required|min:20',
            
        //  ]);

        // $registerData               = $request->all();
        // $userid                     = Auth::user()->id;

        // $user                       = User::find($userid);

        // $user->favoriteDish         = $registerData['favoriteDish'];
        // $user->specialAllergies     = $registerData['specialAllergies'];
        // $user->spicyness            = $registerData['spicyness'];
        // $user->perfectDate          = $registerData['perfectDate'];
        
        // $user->save();

        // return redirect()->route('dashboard');
    }

    public function updateProfile(Request $request)
    {

        //  $this->validate($request, [
        //     'name'                  => 'required',
        //     'surname'               => 'required',
        //     'streetname'            => 'required',
        //     'housenumber'           => 'required',
        //     'city'                  => 'required',
        //     'country'               => 'required',
            
        //  ]);

         $registerData               = $request->all();
         echo "<pre>";
         var_dump($registerData);
         echo "</pre>";
        // $userid                     = Auth::user()->id;

        // $user                       = User::find($userid);

        // $user->surname              = $registerData['surname'];
        // $user->name                 = $registerData['name' ;
        // $user->streetname           = $registerData['streetname'];
        // $user->housenumber          = $registerData['housenumber'];
        // $user->city                 = $registerData['city'];
        // $user->country              = $registerData['country'];
        
        // $user->save();

        // return redirect()->route('dashboard');
    }
}
