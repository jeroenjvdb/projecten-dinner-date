<?php

namespace App\Http\Controllers\Auth;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Request;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function validator(array $data) 
    {
        return validator::make($data, [
                'password' => 'required|confirmed'
            ]);
    }

    public function editPassword()
    {
        return View('Auth.updatePassword');
    }

    public function postEditPassword(Request $request)
    {
        $validate = $this->validate($request->input()->all());
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors());
        }

        $user = Auth::user();
        $user->password = $request->input('password');
        $user->save();

        return redirect()->back()->withSuccess('succesfully updated the password');


        
    }

}
