<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            "city"=>["required","regex:/^[ČĆŠĐŽA-zčćšđž]+([\s-]?[ČĆŠĐŽA-zčćšđž]+)*$/"],
            "san"=>["required","regex:/^[ČĆŠĐŽA-zčćšđž0-9]+(\s+[ČĆŠĐŽA-zčćšđž0-9]+)*$/"],
            "zipcode"=>["required","Numeric","regex:/^\d{5}(?:[-\s]\d{4})?$/"],
            "telephone"=>["required","Numeric","regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]+$/"]
        ];
    }
}
