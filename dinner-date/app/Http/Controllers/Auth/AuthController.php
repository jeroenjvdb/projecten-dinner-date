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

    public function login()
    {
        return view('Auth.login');
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

    public function postLogin(LoginRequest $request)
    {
        return redirect()->route('dashboard');
    }

    public function postRegister(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $this->user->create($data);
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
                'perfectDate'           => 'required|min:10',
                
                 ]);

                $userid                     = Auth::user()->id;

                $user                       = User::find($userid);

                $user->favoriteDish         = $registerData['favoriteDish'];
                $user->specialAllergies     = $registerData['specialAllergies'];
                $user->spicyness            = $registerData['spicyness'];
                $user->perfectDate          = $registerData['perfectDate'];
                
                $user->save();

            break;

            case "smaak":

            $count = Auth::user()
                        ->tastes()
                        ->where('user_id',Auth::user()->id)
                        ->count();

            $first = Auth::user()
                        ->tastes()
                        ->where('user_id',Auth::user()->id)
                        ->first();

                        $delete= $first['pivot']['taste_id'];
    
        var_dump($count);
           if($count == 4)
           {
                $count =Auth::user()
                            ->tastes()
                            //->get();
                            ->detach($delete);
               
           }

            $taste_id =$registerData['tastes'];
                Auth::user()->tastes()->attach($taste_id);

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
