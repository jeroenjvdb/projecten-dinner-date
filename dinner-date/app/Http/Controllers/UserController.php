<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function passwordValidator(array $data) 
    {
        return Validator::make($data, [
                'password' => 'required|confirmed'
            ]);
    }

     public function editPassword()
    {
        return View('Auth.updatePassword');
    }

    public function postEditPassword(Request $request)
    {
        $validate = $this->passwordValidator($request->all());
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors());
        }

        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->back()->withSuccess('succesfully updated the password');
    }
}
