<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateValidationRequest extends FormRequest
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
//          'name' => 'required',
//          'surname' => 'required',
//          'gender' => 'required',
//          'cellphone' => 'required|regex:/(+27)[0-9]{9}/',
//          'email' => 'required|email',
//          'password' => 'required',
//          'confirm_password' => 'required',
        ];
    }
}
