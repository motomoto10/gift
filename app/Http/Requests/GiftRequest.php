<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftRequest extends FormRequest
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
            'gift' => 'required|max:25',
            'explain' => 'max:255',
            'gender' => 'max:25',
            'relation' => 'max:25',
            'old' => 'max:25',
            'anniversary' => 'max:25',
            'price' => 'max:25',
            'day'=> 'max:25'
        ];
    }
}
