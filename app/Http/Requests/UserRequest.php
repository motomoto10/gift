<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
    
        private const GUEST_USER_ID = 1;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(Auth::id() == self::GUEST_USER_ID){
            return[
                'myself' => 'required|max:255',
                ];
        }else {
         
         return [
            'name' => 'required|max:255',
            'myself' => 'required|max:255',
            'gender' => '',
            'born' => '',
        ];   
            
        }
    }
}
