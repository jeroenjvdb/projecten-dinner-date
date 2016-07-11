<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PassRequest;


class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPassword()
    {
        return View('Auth.updatePassword');
    }

    /**
     * @param PassRequest $request
     * @return mixed
     */
    public function postEditPassword(PassRequest $request)
    {
        Auth::user()->update(['password' => bcrypt($request->input('password'))]);

        return redirect()->back()->withSuccess('succesfully updated the password');
    }
}
