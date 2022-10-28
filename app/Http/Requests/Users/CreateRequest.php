<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
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
            case 'HEAD': {
                return [
                   'name' => ['required', 'string', 'min:5', 'max:30', 'unique:users,name'],
                   'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
                   'password' => ['required', 'confirmed', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()],
                    'is_admin' => ['sometimes', 'boolean'],
                ];
                }
            default:
                return [];
        }

    }

    public function attributes(): array{
        return [
            'name' => '"Имя"',
            'email' => '"E-mail"',
            'password' => '"Пароль"'
        ];
       }
}
