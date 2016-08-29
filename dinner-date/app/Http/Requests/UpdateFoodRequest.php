<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateFoodRequest extends Request
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
            'favoriteDish'          => 'required',
            'perfectDate'           => 'required|min:10',
            'favRestaurant'         => 'required',
        ];
    }
}
