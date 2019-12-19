<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nick_name' => 'string|max:255|nullable',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|digits:2',
            'height' => 'required|digits:3',
            'gender' => 'required|in:' . implode(',', User::$gender),
            'position' => 'required|in:' . implode(',', User::$position),
            'throwing' => 'required|numeric|between:1,4',
            'catching' => 'required|numeric|between:1,4',
            'speed' => 'required|numeric|between:1,4',
            'offense' => 'required|numeric|between:1,4',
            'defense' => 'required|numeric|between:1,4',
            'note' => 'string|nullable',
        ];
    }
}
