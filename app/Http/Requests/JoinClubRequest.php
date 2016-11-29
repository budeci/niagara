<?php

namespace App\Http\Requests;

class JoinClubRequest extends Request
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

            'name'   => 'required|min:3',
            'phone'   => 'required',
            'email'   => 'required|email',
            'check'   => 'required',
        ];
    }
}