<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class RegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $before =  Carbon::today()->subYears(18)->format('Y-m-d');
        return [
            'email'                 => 'required|unique:users,email',
            'password'              => 'required|min:8',
            'dateOfBirth'           => 'required|date|before:' . $before,
        ];
    }
}
