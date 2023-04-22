<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyData extends FormRequest
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
          "name" => "required|min:4",
          "logo" => 'required|image|dimensions:min_width=100,min_height=100'
          //"email" => "required",
          //"mobile" => "required|digits_between:9,11"
      ];
    }

    public function messages(){
      return [
          "name.required" => "the name is needed",
          //"email.required" => "email is needed",
          "name.min" => "the company name should be at least 4 character"

      ];

    }
}
