<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeData extends FormRequest
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
          "fname" => "required|min:4",
          "lname" => "required|min:4",

          //"email" => "required",
          //"mobile" => "required|digits_between:9,11"
      ];
    }

    public function messages(){
      return [
          "fname.required" => "the first name is needed",
          "fname.min" => "the first name should be at least 4 character",
          "lname.required" => "the last name is needed",
          "lname.min" => "the last name should be at least 4 character"

      ];

    }
}
