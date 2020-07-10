<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            "username"=>["required","regex:/^[A-Z][A-z0-9]{1,40}$/"],
            "email"=>"required|email",
            "password"=>["required","regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/","min:8"]
        ];
    }

}
