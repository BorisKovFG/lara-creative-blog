<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $minLengthOfContent = 50;

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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Your name, please',
            'email.required' => 'Where is your e-mail?',
            'email.email' => 'Where ie right format of email?',
            'role.required' => 'Choose role of User'

        ];
    }
}
