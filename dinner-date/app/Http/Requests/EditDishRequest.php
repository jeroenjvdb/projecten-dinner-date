<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditDishRequest extends Request
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
        return [
            'name'          => 'required',
            'sDescription'  => 'required',
            'difficulty'    => 'required',
            'ingredients'   => 'required',
            'preparations'  => 'required',
            'fittingDrinks' => 'required',
            'duration'      => 'required',
            'picture'       => 'mimes:jpeg,gif,png',
        ];
    }
}
