<?php

namespace Eoola\Http\Requests;

use Eoola\Http\Requests\Request;

class SubjectManagement extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|max:255|unique:subjects',
            'name' => 'required|max:255'
        ];
    }
}
