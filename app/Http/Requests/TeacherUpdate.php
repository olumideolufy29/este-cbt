<?php

namespace Eoola\Http\Requests;

use Eoola\Http\Requests\Request;

class TeacherUpdate extends Request
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
            'name' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required|in:Laki-laki,Perempuan',
        ];
    }
}
