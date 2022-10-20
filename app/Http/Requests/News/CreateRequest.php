<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
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
                        'title' => ['required', 'string', 'min:3', 'max:300', 'unique:news,title'],
                        'short_discraption' => ['required', 'string', 'min:10', 'max:300'],
                        'text' => ['required', 'string', 'min:100'],
                        'is_private' => ['nullable', 'boolean'],
                    ];
                }
            default:
                return [];
        }

    }

    public function attributes(): array{
        return [
            'title' => '"Заголовок"',
            'short_discraption' => '"Короткое описание"',
            'text' => '"Полное описание новости"'
        ];
       }
}
