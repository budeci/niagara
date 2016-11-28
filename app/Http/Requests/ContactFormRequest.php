<?php

namespace App\Http\Requests;

class ContactFormRequest extends Request
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [

            'fname'   => 'required|min:3',
            'lname'   => 'required|min:3',
            'phone'   => 'required',
            'email'   => 'required|email',
            'message' => 'required',
            'check'   => 'required',
        ];
    }
}