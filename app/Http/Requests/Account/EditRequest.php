<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET': {
                    return [];
                }
            case 'POST': {
                    return [
                        'name' => ['required','string', 'min:2', 'max:100'],
                        'email' =>  ['email:rfc,dns', 'unique:users,email,'.Auth::user()->id],
                      /*  'password' => ['sometimes', 'confirmed', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()],
                */
                    ];
                }
            default:
                return [];
        }
    }
}
