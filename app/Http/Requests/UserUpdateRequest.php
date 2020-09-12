<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'old_password' => 'nullable|string|min:8|max:60',
            'new_password' => 'nullable|string|min:8|max:60|confirmed',
            'contact_info' => 'array',
            'contact_info.*' => 'array',
            'contact_info.*.info' => 'required|string|max:80',
            'contact_info.*.type' => ['required', Rule::in(["Work", "Home", "Email", "Mobile"])],
        ];
    }
}
