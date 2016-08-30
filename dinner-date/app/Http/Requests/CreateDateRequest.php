<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class CreateDateRequest extends Request
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
            'date' => 'required|date|after:' . Carbon::today()->subDay(),
            'area' => 'required|max:255',
            'dish_id' => 'required',
            'description' => 'required|min:20',
//            'preference' => 'required|numeric',
            'typeOfDate' => 'required|numeric',
        ];
    }
}
