<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

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
        return [
            'id' => ['required', 'numeric', 'exists:users,id'],
           'name' => ['required', 'string', 'min:5', 'max:30'],
           'email' => ['required', 'email:rfc,dns'],
           'password' => ['required', 'confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()],
            'is_admin' => ['sometimes', 'boolean'],
        ];
    }

    public function attributes(): array{
        return [
            'name' => '"Имя"',
            'email' => '"E-mail"',
            'password' => '"Пароль"'
        ];
       }

}
