<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginRequest extends Request
{
    /**
     * @return $this|bool
     */
    public function authorize()
    {
        if(!Auth::attempt(['email' => $_POST['email'], 'password' => $_POST['password'] ]))
        {
            $errors = new MessageBag(['login attempt' => ['Email and/or password invalid.']]);
            return redirect()->back()->withInput()->withErrors($errors);
        }else{
           return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
