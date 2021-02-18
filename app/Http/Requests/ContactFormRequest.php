<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
        // return[

        // ];
        return [
                'first_name' => "required|alpha_dash",
                'last_name' => "required|alpha_dash",
                'message' => "required|min:20",
                'email' => "required|email",
        ];
    }
}
