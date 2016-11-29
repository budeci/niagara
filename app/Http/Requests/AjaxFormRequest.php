<?php

namespace App\Http\Requests;

class AjaxFormRequest extends Request
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
        $request =  Request::all();

        return [
            'name'   => 'required|min:3',
            'phone'   => 'required',
        ];
    }
}