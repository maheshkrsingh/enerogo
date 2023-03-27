<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'email'=>'required|email|unique:users,email',
            'firstname'=>'required',
            'middlename'=>'required',
            'lastname'=>'required',
            'password'=>'required|min:5',
            'confirmpassword'=>'required|same:password',
            'mobile_number'=>'required|min:10'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
