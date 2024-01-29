<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:60',
            'email' => 'required|email:rfc|unique:users,email',
            'phone' => ['required', new \App\Rules\phoneUKR],
            'position_id' => [Rule::exists('positions', 'id')],
            'photo' => 'required|file|max:5120|mimes:jpg,jpeg|dimensions:min_width=70,min_height=70',
            'password' => 'required|confirmed|min:6'
        ];
    }
}
